package com.example.sicat.activities;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sicat.R;
import com.example.sicat.activities.detail.DetailActivity;
import com.example.sicat.adapter.TransaksiListDetailItemAdapter;
import com.example.sicat.controllers.SessionManager;
import com.example.sicat.model.DetailTransaksi;
import com.example.sicat.model.Transaksi;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import butterknife.BindView;
import butterknife.ButterKnife;

public class TransaksiListDetalItemActivity extends AppCompatActivity {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    //recycler_detail_transaksi
    RecyclerView recycler_detail_transaksi;
    ArrayList<DetailTransaksi> dataModelArrayList;
    SessionManager sessionManager; // session

    TransaksiListDetailItemAdapter transaksiListDetailItemAdapter;

    private static String URL_Nya="http://192.168.56.1/project_smtr4/api/transaksi_list/Get_detail_by_id/"; // url http request

    String id_prasmanan;

    public static final String EXTRA_DETAIL3 = "detail";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_transaksi_list_detal_item);

        ButterKnife.bind(this);
        initActionBar();

        // inisialisasi objek session
        sessionManager = new SessionManager(this);
        sessionManager.checkLogin(); // untuk mengecek apakah sudah login apa belum

        recycler_detail_transaksi =(RecyclerView) findViewById(R.id.recycler_detail_transaksi);
        recycler_detail_transaksi.setLayoutManager(new LinearLayoutManager(this));
        recycler_detail_transaksi.setNestedScrollingEnabled(true);
        recycler_detail_transaksi.setHasFixedSize(true);

        id_prasmanan = getIntent().getStringExtra("EXTRA_ID_PRASMANAN");

        // ambil semua data
        retrieveJSON(id_prasmanan);
    }

    private void initActionBar(){
        setSupportActionBar(toolbar);
        if(getSupportActionBar() != null){
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        }
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        switch (item.getItemId()){

            case android.R.id.home:
                onBackPressed();
                break;
        }
        return true;
    }

    private void retrieveJSON(String id_prasmanan) {
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_Nya,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            JSONArray jsonArray = jsonObject.getJSONArray("data");

                            if(success.equals("1")){
                                dataModelArrayList = new ArrayList<>();

                                for (int i = 0 ; i < jsonArray.length() ; i++){

                                    DetailTransaksi playerModel = new DetailTransaksi();
                                    JSONObject object = jsonArray.getJSONObject(i);


                                    String id_bonus = "kosong";

                                    // mengambil data dari api
                                    try{

                                        id_bonus = object.getString("id_bonus").trim();

                                        //nm_menu = object.getString("nm_menu").trim()+" (BONUS)";

                                    }catch (Exception e){}

                                    String id_menu = object.getString("id_menu").trim();
                                    String nm_menu = object.getString("nm_menu").trim();
                                    String id_kat = object.getString("id_kat").trim();
                                    String nm_kat = object.getString("nm_kat").trim();
                                    String tipe = object.getString("tipe").trim();
                                    String hrg_porsi = object.getString("hrg_porsi").trim();
                                    String gambar = object.getString("gambar").trim();
                                    String deskripsi = object.getString("deskripsi").trim();

                                    playerModel.setId_bonus(id_bonus);
                                    playerModel.setId_menu(id_menu);
                                    playerModel.setNm_menu(nm_menu);
                                    playerModel.setId_kat(id_kat);
                                    playerModel.setNm_kat(nm_kat);
                                    playerModel.setTipe(tipe);
                                    playerModel.setHrg_porsi(Integer.parseInt(hrg_porsi));
                                    playerModel.setGambar(gambar);
                                    playerModel.setDeskripsi(deskripsi);

                                    //dataModelArrayList.clear();
                                    dataModelArrayList.add(playerModel);
                                }

                                setupListview();
                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(TransaksiListDetalItemActivity.this ,"Error api (gagal response) :"+e.toString(),Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(TransaksiListDetalItemActivity.this ,"Error volley :"+error.toString(),Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id_prasmanan",id_prasmanan);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    private void setupListview() {

        transaksiListDetailItemAdapter = new TransaksiListDetailItemAdapter(this, dataModelArrayList);
        recycler_detail_transaksi.setAdapter(transaksiListDetailItemAdapter);

        transaksiListDetailItemAdapter.notifyDataSetChanged();

        transaksiListDetailItemAdapter.setOnItemClickListener(new TransaksiListDetailItemAdapter.ClickListener() {
            @Override
            public void onClick(View view, int position) {
                //Toast.makeText(TransaksiListDetalItemActivity.this ,"posisi : "+position,Toast.LENGTH_SHORT).show();
                TextView nm_menu = view.findViewById(R.id.txt_product_name);
                Intent intent = new Intent(getApplicationContext(), DetailActivity.class);
                intent.putExtra(EXTRA_DETAIL3, nm_menu.getText().toString());
                startActivity(intent);
            }
        });

    }
}
