package com.example.sicat.activities;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sicat.R;
import com.example.sicat.adapter.ListBonus;
import com.example.sicat.common.Common;
import com.example.sicat.model.Bonus;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import butterknife.BindView;
import butterknife.ButterKnife;

public class DaftarBonusActivity extends AppCompatActivity {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    Button btn_cari;
    EditText searching;
    private String URLstring2 = "http://192.168.56.1/project_smtr4/api/daftar_bonus/search_like";

    private String URLstring = "http://192.168.56.1/project_smtr4/api/transaksi/data_bonus";
    private static ProgressDialog mProgressDialog;
    private ListView listView;

    ArrayList<Bonus> dataModelArrayList;
    ArrayList<Bonus> dataModelArrayList2;

    private ListBonus listAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_daftar_bonus);

        ButterKnife.bind(this);
        initActionBar();

        listView = findViewById(R.id.lv_bonus);

        // untuk fitur pencaharian
        btn_cari = (Button) findViewById(R.id.btn_cari);
        searching = (EditText) findViewById(R.id.searching);

        btn_cari.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // ambil value dari edit text
                String cari = searching.getText().toString().trim();

                Log.d("datanya",cari);
                retrieveJSON2(cari);
            }
        });

        // ambil semua bonus menu
        retrieveJSON();
    }

    private void retrieveJSON() {
        showSimpleProgressDialog(this, "Loading...", "Fetching Json", true);
        StringRequest stringRequest = new StringRequest(Request.Method.GET, URLstring, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                //Log.d("strrrrr", ">>" + response);
                try {
                    JSONObject obj = new JSONObject(response);
                    if (obj.optString("success").equals("1")) {
                        dataModelArrayList = new ArrayList<>();
                        JSONArray dataArray = obj.getJSONArray("data");
                        for (int i = 0; i < dataArray.length(); i++) {
                            Bonus playerModel = new Bonus();
                            JSONObject dataobj = dataArray.getJSONObject(i);
                            playerModel.setId_bonus(dataobj.getString("id_bonus"));
                            playerModel.setId_menu(dataobj.getString("id_menu"));
                            playerModel.setNm_menu(dataobj.getString("nm_menu"));
                            playerModel.setId_kat(dataobj.getString("id_kat"));
                            playerModel.setNm_kat(dataobj.getString("nm_kat"));
                            playerModel.setTipe(dataobj.getString("tipe"));
                            playerModel.setHrg_porsi(Integer.parseInt(dataobj.getString("hrg_porsi")));
                            playerModel.setGambar(dataobj.getString("gambar"));
                            playerModel.setDeskripsi(dataobj.getString("deskripsi"));

                            //dataModelArrayList.clear();
                            dataModelArrayList.add(playerModel);
                        }
                        setupListview();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                    removeSimpleProgressDialog();
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        //displaying the error in toast if occurrs
                        Toast.makeText(getApplicationContext(), error.getMessage(), Toast.LENGTH_SHORT).show();
                        removeSimpleProgressDialog();
                    }
                });
        // request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    private void setupListview() {
        removeSimpleProgressDialog();
        //will remove progress dialog
        listAdapter = new ListBonus(this, dataModelArrayList);
        listView.setAdapter(listAdapter);
    }

    public static void removeSimpleProgressDialog() {
        try {
            if (mProgressDialog != null) {
                if (mProgressDialog.isShowing()) {
                    mProgressDialog.dismiss();
                    mProgressDialog = null;
                }
            }
        } catch (IllegalArgumentException ie) {
            ie.printStackTrace();
        } catch (RuntimeException re) {
            re.printStackTrace();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public static void showSimpleProgressDialog(Context context, String title, String msg, boolean isCancelable) {
        try {
            if (mProgressDialog == null) {
                mProgressDialog = ProgressDialog.show(context, title, msg);
                mProgressDialog.setCancelable(isCancelable);
            }
            if (!mProgressDialog.isShowing()) {
                mProgressDialog.show();
            }
        } catch (IllegalArgumentException ie) {
            ie.printStackTrace();
        } catch (RuntimeException re) {
            re.printStackTrace();
        } catch (Exception e) {
            e.printStackTrace();
        }
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

    private void retrieveJSON2(String cari) {
        showSimpleProgressDialog(this, "Loading...", "Fetching Json", true);
        StringRequest stringRequest = new StringRequest(Request.Method.POST, URLstring2,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);

                            String success = jsonObject.getString("success");

                            JSONArray jsonArray = jsonObject.getJSONArray("bonus");

                            if(success.equals("1")){
                                dataModelArrayList2 = new ArrayList<>();
                                for (int i = 0 ; i < jsonArray.length() ; i++){
                                    Bonus playerModel = new Bonus();
                                    JSONObject object = jsonArray.getJSONObject(i);
                                    // mengambil data dari api
                                    playerModel.setId_bonus(object.getString("id_bonus"));
                                    playerModel.setId_menu(object.getString("id_menu"));
                                    playerModel.setNm_menu(object.getString("nm_menu"));
                                    playerModel.setId_kat(object.getString("id_kat"));
                                    playerModel.setNm_kat(object.getString("nm_kat"));
                                    playerModel.setTipe(object.getString("tipe"));
                                    playerModel.setHrg_porsi(Integer.parseInt(object.getString("hrg_porsi")));
                                    playerModel.setGambar(object.getString("gambar"));
                                    playerModel.setDeskripsi(object.getString("deskripsi"));

                                    dataModelArrayList2.add(playerModel);
                                }
                                setupListview2();
                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                            //Toast.makeText(DaftarBonusActivity.this ,"Error api (gagal response) :"+e.toString(),Toast.LENGTH_SHORT).show();
                            retrieveJSON();
                            removeSimpleProgressDialog();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        //displaying the error in toast if occurrs
                        //Toast.makeText(DaftarBonusActivity.this ,"Error volley :"+error.toString(),Toast.LENGTH_SHORT).show();
                        retrieveJSON();
                        removeSimpleProgressDialog();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("nm_menu",cari);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    private void setupListview2() {
        removeSimpleProgressDialog();
        //will remove progress dialog
        listAdapter = new ListBonus(this, dataModelArrayList2);
        listView.setAdapter(listAdapter);
    }
}
