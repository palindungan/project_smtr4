package com.example.sicat.adapter;

import android.content.Context;
import android.content.Intent;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sicat.Database.ModelDB.Cart;
import com.example.sicat.R;
import com.example.sicat.activities.CartActivity;
import com.example.sicat.common.Common;
import com.example.sicat.controllers.Base_url;
import com.example.sicat.controllers.SessionManager;
import com.example.sicat.model.Paket;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

public class ListPaket extends BaseAdapter {

    private Context context;
    private ArrayList<Paket> dataModelArrayList;
    SessionManager sessionManager; // session

    Base_url base_url = new Base_url();
    String url = base_url.getUrl();

    private String URL_PAKET = url + "transaksi/Get_paket_by_id"; // url http request

    public ListPaket(Context context, ArrayList<Paket> dataModelArrayList) {
        this.context = context;
        this.dataModelArrayList = dataModelArrayList;

        // inisialisasi objek session
        sessionManager = new SessionManager(context);
    }

    @Override
    public int getCount() {
        return dataModelArrayList.size();
    }

    @Override
    public Object getItem(int position) {
        return dataModelArrayList.get(position);
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder holder;
        if (convertView == null) {
            holder = new ViewHolder();
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = inflater.inflate(R.layout.list_paket, null, true);
            holder.tv_id_paket = (TextView) convertView.findViewById(R.id.tv_id_paket);
            holder.tv_nm_paket = (TextView) convertView.findViewById(R.id.tv_nm_paket);
            holder.tv_hrg_paket = (TextView) convertView.findViewById(R.id.tv_hrg_paket);
            holder.tv_jml_menu = (TextView) convertView.findViewById(R.id.tv_jml_menu);
            holder.tv_jml_bonus = (TextView) convertView.findViewById(R.id.tv_jml_bonus);
            holder.btn_pilih = (Button) convertView.findViewById(R.id.btn_pilih);
            convertView.setTag(holder);
        } else {
            // the getTag returns the viewHolder object set as a tag to the view
            holder = (ViewHolder) convertView.getTag();
        }
        // Compiler akan mengatur gambar ini di imageview.
        // Kemudian akan mengatur informasi lain di tampilan teks masing-masing.
        holder.tv_id_paket.setText("ID : " + dataModelArrayList.get(position).getId_paket());
        holder.tv_nm_paket.setText("Nama Paket: " + dataModelArrayList.get(position).getNm_paket());
        holder.tv_hrg_paket.setText("Harga : " + dataModelArrayList.get(position).getHrg_paket());
        holder.tv_jml_menu.setText("Jumlah Menu : " + dataModelArrayList.get(position).getJml_menu());
        holder.tv_jml_bonus.setText("Jumlah Bonus: " + dataModelArrayList.get(position).getJml_bonus());

        holder.btn_pilih.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Boolean status = true;
                String id_paket = dataModelArrayList.get(position).getId_paket();
                String nm_paket = dataModelArrayList.get(position).getNm_paket();
                String hrg_paket = String.valueOf(dataModelArrayList.get(position).getHrg_paket());
                String jml_menu = String.valueOf(dataModelArrayList.get(position).getJml_menu());
                String jml_bonus = String.valueOf(dataModelArrayList.get(position).getJml_bonus());
                sessionManager.setCart(status, id_paket, nm_paket, hrg_paket, jml_menu, jml_bonus);

                retrieveJSON(id_paket);

                Intent intent = new Intent(context, CartActivity.class);
                context.startActivity(intent); // membuka activity lain
            }
        });

        return convertView;
    }

    private void retrieveJSON(String id_paket) {
        //
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_PAKET,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.d("strrrrr", ">>" + response);
                        try {
                            // create new cart item
                            Cart cartItem = new Cart();

                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            JSONArray jsonArray = jsonObject.getJSONArray("data");

                            if (success.equals("1")) {
                                for (int i = 0; i < jsonArray.length(); i++) {
                                    JSONObject object = jsonArray.getJSONObject(i);

                                    // mengambil data dari api
                                    String id_paket = object.getString("id_paket").trim();
                                    String id_bonus = "kosong";
                                    String id_menu = object.getString("id_menu").trim();
                                    String nm_menu = object.getString("nm_menu").trim();
                                    String id_kat = object.getString("id_kat").trim();
                                    String nm_kat = object.getString("nm_kat").trim();
                                    String tipe = object.getString("tipe").trim();
                                    String hrg_porsi = object.getString("hrg_porsi").trim();
                                    String gambar = object.getString("gambar").trim();
                                    String deskripsi = object.getString("deskripsi").trim();

                                    try {

                                        id_bonus = object.getString("id_bonus").trim();

                                        //nm_menu = object.getString("nm_menu").trim()+" (BONUS)";

                                    } catch (Exception e) {
                                    }

                                    cartItem.id_menu = id_menu;
                                    cartItem.nm_menu = nm_menu;
                                    cartItem.nm_kat = nm_kat;
                                    cartItem.tipe = tipe;
                                    cartItem.hrg_porsi = Integer.parseInt(hrg_porsi);
                                    cartItem.gambar = gambar;
                                    cartItem.deskripsi = deskripsi;
                                    cartItem.id_bonus = id_bonus;
                                    cartItem.id_kat = id_kat;

                                    // add to db
                                    Common.cartRepository.insertToCart(cartItem);
                                }
                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(context, "Error api (gagal response) :" + e.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(context, "Error volley :" + error.toString(), Toast.LENGTH_SHORT).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id_paket", id_paket);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(context);
        requestQueue.add(stringRequest);
    }

    // tambahan
    @Override
    public int getViewTypeCount() {
        return getCount();
    }

    @Override
    public int getItemViewType(int position) {
        return position;
    }

    private class ViewHolder {
        protected TextView tv_id_paket, tv_nm_paket, tv_hrg_paket, tv_jml_menu, tv_jml_bonus;
        protected Button btn_pilih;
    }
}
