package com.example.sicat;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sicat.adapter.PanduanAdapter;
import com.example.sicat.model.Panduan;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

import butterknife.BindView;
import butterknife.ButterKnife;

public class PanduanActivity extends AppCompatActivity {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    private String URLstring = "http://192.168.56.1/project_smtr4/api/keterangan_paket/panduan";

    private RecyclerView recyclerPanduan;
    ArrayList<Panduan> dataModelArrayList;

    private PanduanAdapter panduanAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_panduan);

        ButterKnife.bind(this);
        initActionBar();

        recyclerPanduan = findViewById(R.id.recyclePanduan);

        // ambil semua
        retrieveJSON();
    }

    private void retrieveJSON() {
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
                            Panduan playerModel = new Panduan();
                            JSONObject dataobj = dataArray.getJSONObject(i);
                            playerModel.setId_keterangan_paket(dataobj.getString("id_keterangan_paket"));
                            playerModel.setDeskripsi(dataobj.getString("deskripsi"));

                            //dataModelArrayList.clear();
                            dataModelArrayList.add(playerModel);
                        }
                        setupListview();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();

                    Toast.makeText(getApplicationContext(), "Error Request "+e.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        //displaying the error in toast if occurrs
                        Toast.makeText(getApplicationContext(), "Error Volley "+error.getMessage(), Toast.LENGTH_SHORT).show();
                    }
                });
        // request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    private void setupListview() {
        //will remove progress dialog
        panduanAdapter = new PanduanAdapter(this, dataModelArrayList);
        recyclerPanduan.setAdapter(panduanAdapter);
        GridLayoutManager layoutManager = new GridLayoutManager(this,1, GridLayoutManager.VERTICAL,false);
        recyclerPanduan.setLayoutManager(layoutManager);
        recyclerPanduan.setNestedScrollingEnabled(true);
        panduanAdapter.notifyDataSetChanged();
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
}
