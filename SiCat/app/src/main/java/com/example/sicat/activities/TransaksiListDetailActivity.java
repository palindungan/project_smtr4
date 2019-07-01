package com.example.sicat.activities;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.sicat.R;
import com.squareup.picasso.Picasso;

import butterknife.BindView;
import butterknife.ButterKnife;

public class TransaksiListDetailActivity extends AppCompatActivity {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    // mengambil data dari api
    String id_prasmanan;
    String nm_paket;
    int jml_porsi;
    int tot_biaya;
    int tot_dp;
    int sisa_bayar;
    String ket_acara;
    String tgl_acara;
    String tgl_pemesanan;
    String tgl_pelunasan;
    String upload_bukti_bayar;
    String status;

    TextView txt_id_prasmanan,txt_nm_paket,txt_jml_porsi,txt_tot_biaya,txt_tot_dp,txt_sisa_bayar,txt_ket_acara,txt_tgl_acara,txt_tgl_pemesanan,txt_tgl_pelunasan,txt_status;
    ImageView upload_image;
    Button btn_link_detail;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_transaksi_list_detail);

        ButterKnife.bind(this);
        initActionBar();

        id_prasmanan = getIntent().getStringExtra("EXTRA_ID_PRASMANAN");
        nm_paket = getIntent().getStringExtra("EXTRA_NM_PAKET");
        jml_porsi = getIntent().getIntExtra("EXTRA_JML_PORSI",0);
        tot_biaya = getIntent().getIntExtra("EXTRA_TOT_BIAYA",0);
        tot_dp = getIntent().getIntExtra("EXTRA_TOT_DP",0);
        sisa_bayar = getIntent().getIntExtra("EXTRA_SISA_BAYAR",0);
        ket_acara = getIntent().getStringExtra("EXTRA_KET_ACARA");
        tgl_acara = getIntent().getStringExtra("EXTRA_TGL_ACARA");
        tgl_pemesanan = getIntent().getStringExtra("EXTRA_TGL_PEMESANAN");
        tgl_pelunasan = getIntent().getStringExtra("EXTRA_TGL_PELUNASAN");
        upload_bukti_bayar = getIntent().getStringExtra("EXTRA_UPLOAD_BUKTI_BAYAR");
        status = getIntent().getStringExtra("EXTRA_STATUS");

        txt_id_prasmanan = (TextView) findViewById(R.id.txt_id_prasmanan);
        txt_nm_paket  = (TextView) findViewById(R.id.txt_nm_paket);
        txt_jml_porsi  = (TextView) findViewById(R.id.txt_jml_porsi);
        txt_tot_biaya  = (TextView) findViewById(R.id.txt_tot_biaya);
        txt_tot_dp  = (TextView) findViewById(R.id.txt_tot_dp);
        txt_sisa_bayar  = (TextView) findViewById(R.id.txt_sisa_bayar);
        txt_ket_acara  = (TextView) findViewById(R.id.txt_ket_acara);
        txt_tgl_acara  = (TextView) findViewById(R.id.txt_tgl_acara);
        txt_tgl_pemesanan  = (TextView) findViewById(R.id.txt_tgl_pemesanan);
        txt_tgl_pelunasan  = (TextView) findViewById(R.id.txt_tgl_pelunasan);
        upload_image = (ImageView) findViewById(R.id.upload_image);
        txt_status = (TextView) findViewById(R.id.txt_status);

        btn_link_detail = (Button) findViewById(R.id.btn_link_detail);

        txt_id_prasmanan.setText(id_prasmanan);
        txt_nm_paket.setText(nm_paket);
        txt_jml_porsi.setText(String.valueOf(jml_porsi));
        txt_tot_biaya.setText(String.valueOf(tot_biaya));
        txt_tot_dp.setText(String.valueOf(tot_dp));
        txt_sisa_bayar.setText(String.valueOf(sisa_bayar));
        txt_ket_acara.setText(ket_acara);
        txt_tgl_acara.setText(tgl_acara);
        txt_tgl_pemesanan.setText(tgl_pemesanan);
        txt_tgl_pelunasan.setText(tgl_pelunasan);

        //Picasso.get().load(dataModelArrayList.get(position).getGambar()).into(holder.img_product);
        Picasso.get().load(upload_bukti_bayar).into(upload_image);
        
        if(status.equals("pending")){
            String x = "Pending";
            txt_status.setText(x);
        }else if(status.equals("belum_lunas")){
            String x = "Belum Lunas";
            txt_status.setText(x);
        }

        btn_link_detail.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(TransaksiListDetailActivity.this,TransaksiListDetalItemActivity.class);
                intent.putExtra("EXTRA_ID_PRASMANAN", id_prasmanan);
                startActivity(intent);
            }
        });
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
