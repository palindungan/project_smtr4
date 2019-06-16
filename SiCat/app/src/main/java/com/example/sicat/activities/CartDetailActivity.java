package com.example.sicat.activities;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.widget.TextView;

import com.example.sicat.R;
import com.example.sicat.controllers.SessionManager;

import java.util.HashMap;

import butterknife.BindView;
import butterknife.ButterKnife;

public class CartDetailActivity extends AppCompatActivity {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    TextView tv_status,tv_id,tv_nama,tv_hrg, tv_menu,tv_bonus;
    SessionManager sessionManager; // session

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cart_detail);

        // inisialisasi objek session
        sessionManager = new SessionManager(this);

        ButterKnife.bind(this);
        initActionBar();

        tv_status = (TextView)findViewById(R.id.tv_status);
        tv_id = (TextView)findViewById(R.id.tv_id);
        tv_nama = (TextView)findViewById(R.id.tv_nama);
        tv_hrg = (TextView)findViewById(R.id.tv_hrg);
        tv_menu = (TextView)findViewById(R.id.tv_menu);
        tv_bonus = (TextView)findViewById(R.id.tv_bonus);

        setTextView();
    }

    private void setTextView() {
        // untuk menerima data dari session
        Boolean statusCart = sessionManager.getCartStatus();

        HashMap<String , String> cart = sessionManager.getCartDetailPaket();
        String id_paket = cart.get(sessionManager.ID_PAKET);
        String nm_paket = cart.get(sessionManager.NM_PAKET);
        String hrg_paket = cart.get(sessionManager.HRG_PAKET);
        String jml_menu = cart.get(sessionManager.JML_MENU);
        String jml_bonus = cart.get(sessionManager.JML_BONUS);

        if (statusCart==true){
            tv_status.setText("STATUS : "+statusCart);
            tv_id.setText("ID PAKET : "+id_paket);
            tv_nama.setText("NAMA : "+nm_paket);
            tv_hrg.setText("HARGA : "+hrg_paket);
            tv_menu.setText("MENU : "+jml_menu);
            tv_bonus.setText("BONUS : "+jml_bonus);
        }else {
            tv_status.setText("STATUS : "+statusCart);
            tv_id.setText("ID PAKET : "+"KOSONG");
            tv_nama.setText("NAMA : "+"KOSONG");
            tv_hrg.setText("HARGA : "+"KOSONG");
            tv_menu.setText("MENU : "+"KOSONG");
            tv_bonus.setText("BONUS : "+"KOSONG");
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
}
