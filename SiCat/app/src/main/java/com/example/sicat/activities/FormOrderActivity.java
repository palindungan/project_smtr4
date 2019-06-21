package com.example.sicat.activities;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.support.v7.widget.Toolbar;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import com.example.sicat.R;
import com.example.sicat.common.Common;
import com.example.sicat.controllers.SessionManager;

import org.w3c.dom.Text;

import butterknife.BindView;
import butterknife.ButterKnife;

public class FormOrderActivity extends AppCompatActivity {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    Button btn_next;
    TextView txt_nm_paket,txt_hrg_paket,txt_tot_biaya,txt_tot_bayar,txt_kembalian;
    EditText txt_jml_porsi;
    CardView sisa;

    SessionManager sessionManager;

    String EXTRA_JML_PORSI = "EXTRA_JML_PORSI";
    String EXTRA_TOT_BIAYA = "EXTRA_TOT_BIAYA";
    String EXTRA_TOT_BAYAR = "EXTRA_TOT_BAYAR";
    String EXTRA_SISA_BAYAR = "EXTRA_SISA_BAYAR";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_form_order);

        sessionManager = new SessionManager(this);

        ButterKnife.bind(this);
        initActionBar();

        btn_next = (Button)findViewById(R.id.btn_next);
        txt_nm_paket = (TextView)findViewById(R.id.txt_nm_paket);
        txt_hrg_paket = (TextView)findViewById(R.id.txt_hrg_paket);
        txt_jml_porsi = (EditText)findViewById(R.id.txt_jml_porsi);
        txt_tot_biaya = (TextView)findViewById(R.id.txt_tot_biaya);
        txt_tot_bayar = (TextView)findViewById(R.id.txt_tot_bayar);
        txt_kembalian = (TextView)findViewById(R.id.txt_kembalian);
        sisa = (CardView)findViewById(R.id.sisa);

        //sisa.setVisibility(View.INVISIBLE);

        String nm_paket = sessionManager.getCartDetailPaket().get("NM_PAKET");
        String hrg_paket = sessionManager.getCartDetailPaket().get("HRG_PAKET");

        txt_nm_paket.setText(nm_paket);
        txt_hrg_paket.setText(hrg_paket);

        txt_jml_porsi.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence s, int start, int count, int after) {
                // none
            }

            @Override
            public void onTextChanged(CharSequence s, int start, int before, int count) {
                // none
            }

            @Override
            public void afterTextChanged(Editable s) {
                String jml_porsi_txt = txt_jml_porsi.getText().toString().trim(); //

                try {

                    int jml_porsi_nya = Integer.parseInt(jml_porsi_txt);
                    if(jml_porsi_nya >= 0){

                        int hrg_paket_nya = Integer.parseInt(hrg_paket);

                        int total = hrg_paket_nya * jml_porsi_nya;
                        txt_tot_biaya.setText(String.valueOf(total)); //

                        int tot_bayarnya = total/2;
                        txt_tot_bayar.setText(String.valueOf(tot_bayarnya)); //

                        // masih sama karena statusnya belum diubah admin
                        txt_kembalian.setText(String.valueOf(total)); //
                    }

                }catch (Exception e){
                    // do nothing
                }
            }
        });

        btn_next.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                String jml_porsi = txt_jml_porsi.getText().toString().trim();
                String tot_biaya = txt_tot_biaya.getText().toString().trim();
                String tot_bayar = txt_tot_bayar.getText().toString().trim();
                String kembalian = txt_kembalian.getText().toString().trim();

                Intent intent = new Intent(FormOrderActivity.this,FormOrderFinishActivity.class);
                intent.putExtra(EXTRA_JML_PORSI, jml_porsi);
                intent.putExtra(EXTRA_TOT_BIAYA, tot_biaya);
                intent.putExtra(EXTRA_TOT_BAYAR, tot_bayar);
                intent.putExtra(EXTRA_SISA_BAYAR, kembalian);
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
