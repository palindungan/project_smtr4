package com.example.sicat.activities;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sicat.R;
import com.example.sicat.adapter.TransaksiListAdapter;
import com.example.sicat.controllers.Base_url;
import com.example.sicat.controllers.SessionManager;
import com.example.sicat.model.Transaksi;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

import butterknife.BindView;
import butterknife.ButterKnife;

public class TransaksiListActivity extends AppCompatActivity {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    RecyclerView recycler_transaksi;
    ArrayList<Transaksi> dataModelArrayList;
    SessionManager sessionManager; // session

    TransaksiListAdapter transaksiListAdapter;

    Base_url base_url = new Base_url();
    String url = base_url.getUrl();

    private String URL_Nya = url + "transaksi_list/Get_prasmanan_by_id/"; // url http request
    String id_customer;

    String EXTRA_ID_PRASMANAN = "EXTRA_ID_PRASMANAN";
    String EXTRA_NM_PAKET = "EXTRA_NM_PAKET";
    String EXTRA_JML_PORSI = "EXTRA_JML_PORSI";
    String EXTRA_TOT_BIAYA = "EXTRA_TOT_BIAYA";
    String EXTRA_TOT_DP = "EXTRA_TOT_DP";
    String EXTRA_SISA_BAYAR = "EXTRA_SISA_BAYAR";
    String EXTRA_KET_ACARA = "EXTRA_KET_ACARA";
    String EXTRA_TGL_ACARA = "EXTRA_TGL_ACARA";
    String EXTRA_TGL_PEMESANAN = "EXTRA_TGL_PEMESANAN";
    String EXTRA_TGL_PELUNASAN = "EXTRA_TGL_PELUNASAN";
    String EXTRA_UPLOAD_BUKTI_BAYAR = "EXTRA_UPLOAD_BUKTI_BAYAR";
    String EXTRA_STATUS = "EXTRA_STATUS";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_transaksi_list);

        ButterKnife.bind(this);
        initActionBar();

        // inisialisasi objek session
        sessionManager = new SessionManager(this);
        sessionManager.checkLogin2(); // untuk mengecek apakah sudah login apa belum

        // untuk menerima data dari session
        HashMap<String, String> customer = sessionManager.getCustomerDetail();
        id_customer = customer.get(sessionManager.ID_CUSTOMER);

        recycler_transaksi = (RecyclerView) findViewById(R.id.recycler_transaksi);
        recycler_transaksi.setLayoutManager(new LinearLayoutManager(this));
        recycler_transaksi.setNestedScrollingEnabled(true);
        recycler_transaksi.setHasFixedSize(true);
    }

    private void initActionBar() {
        setSupportActionBar(toolbar);
        if (getSupportActionBar() != null) {
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        }
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {

            case android.R.id.home:
                onBackPressed();
                break;
        }
        return true;
    }

    private void retrieveJSON(String id_customer) {

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_Nya,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            JSONArray jsonArray = jsonObject.getJSONArray("data");

                            if (success.equals("1")) {
                                dataModelArrayList = new ArrayList<>();

                                for (int i = 0; i < jsonArray.length(); i++) {

                                    Transaksi playerModel = new Transaksi();
                                    JSONObject object = jsonArray.getJSONObject(i);

                                    // mengambil data dari api
                                    String id_prasmanan = object.getString("id_prasmanan").trim();
                                    String id_customer = object.getString("id_customer").trim();
                                    String nm_customer = object.getString("nm_customer").trim();
                                    String id_paket = object.getString("id_paket").trim();
                                    String nm_paket = object.getString("nm_paket").trim();
                                    String jml_porsi = object.getString("jml_porsi").trim();
                                    String tot_biaya = object.getString("tot_biaya").trim();
                                    String tot_dp = object.getString("tot_dp").trim();
                                    String sisa_bayar = object.getString("sisa_bayar").trim();
                                    String upload_bukti_bayar = object.getString("upload_bukti_bayar").trim();
                                    String ket_acara = object.getString("ket_acara").trim();
                                    String tgl_pemesanan = object.getString("tgl_pemesanan").trim();
                                    String tgl_pelunasan = object.getString("tgl_pelunasan").trim();
                                    String tgl_acara = object.getString("tgl_acara").trim();
                                    String status = object.getString("status").trim();

                                    playerModel.setId_prasmanan(id_prasmanan);
                                    playerModel.setId_customer(id_customer);
                                    playerModel.setNm_customer(nm_customer);
                                    playerModel.setId_paket(id_paket);
                                    playerModel.setNm_paket(nm_paket);
                                    playerModel.setJml_porsi(Integer.parseInt(jml_porsi));
                                    playerModel.setTot_biaya(Integer.parseInt(tot_biaya));
                                    playerModel.setTot_dp(Integer.parseInt(tot_dp));
                                    playerModel.setSisa_bayar(Integer.parseInt(sisa_bayar));
                                    playerModel.setUpload_bukti_bayar(upload_bukti_bayar);
                                    playerModel.setKet_acara(ket_acara);
                                    playerModel.setTgl_pemesanan(tgl_pemesanan);
                                    playerModel.setTgl_pelunasan(tgl_pelunasan);
                                    playerModel.setTgl_acara(tgl_acara);
                                    playerModel.setStatus(status);

                                    //dataModelArrayList.clear();
                                    dataModelArrayList.add(playerModel);
                                }

                                setupListview();
                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(TransaksiListActivity.this, "Error api (gagal response) :" + e.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(TransaksiListActivity.this, "Error volley :" + error.toString(), Toast.LENGTH_SHORT).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id_customer", id_customer);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    private void setupListview() {
        transaksiListAdapter = new TransaksiListAdapter(this, dataModelArrayList);
        recycler_transaksi.setAdapter(transaksiListAdapter);

        transaksiListAdapter.notifyDataSetChanged();
        transaksiListAdapter.setOnItemClickListener(new TransaksiListAdapter.ClickListener() {
            @Override
            public void onClick(View view, int position) {

                String id_prasmanan = dataModelArrayList.get(position).getId_prasmanan();
                String nm_paket = dataModelArrayList.get(position).getNm_paket();
                int jml_porsi = dataModelArrayList.get(position).getJml_porsi();
                int tot_biaya = dataModelArrayList.get(position).getTot_biaya();
                int tot_dp = dataModelArrayList.get(position).getTot_dp();
                int sisa_bayar = dataModelArrayList.get(position).getSisa_bayar();
                String ket_acara = dataModelArrayList.get(position).getKet_acara();
                String tgl_acara = dataModelArrayList.get(position).getTgl_acara();
                String tgl_pemesanan = dataModelArrayList.get(position).getTgl_pemesanan();
                String tgl_pelunasan = dataModelArrayList.get(position).getTgl_pelunasan();
                String upload_bukti_bayar = dataModelArrayList.get(position).getUpload_bukti_bayar();
                String status = dataModelArrayList.get(position).getStatus();

                Intent intent = new Intent(TransaksiListActivity.this, TransaksiListDetailActivity.class);
                intent.putExtra(EXTRA_ID_PRASMANAN, id_prasmanan);
                intent.putExtra(EXTRA_NM_PAKET, nm_paket);
                intent.putExtra(EXTRA_JML_PORSI, jml_porsi);
                intent.putExtra(EXTRA_TOT_BIAYA, tot_biaya);
                intent.putExtra(EXTRA_TOT_DP, tot_dp);
                intent.putExtra(EXTRA_SISA_BAYAR, sisa_bayar);
                intent.putExtra(EXTRA_KET_ACARA, ket_acara);
                intent.putExtra(EXTRA_TGL_ACARA, tgl_acara);
                intent.putExtra(EXTRA_TGL_PEMESANAN, tgl_pemesanan);
                intent.putExtra(EXTRA_TGL_PELUNASAN, tgl_pelunasan);
                intent.putExtra(EXTRA_UPLOAD_BUKTI_BAYAR, upload_bukti_bayar);
                intent.putExtra(EXTRA_STATUS, status);

                //Toast.makeText(TransaksiListActivity.this ,dataModelArrayList.get(position).getStatus(),Toast.LENGTH_SHORT).show();

                startActivity(intent);
            }
        });
    }

    @Override
    protected void onResume() {
        super.onResume();

        // ambil semua data
        retrieveJSON(id_customer);
    }
}
