package com.example.sicat.activities;

import android.app.DatePickerDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;
import java.util.HashMap;
import java.util.Locale;

import com.example.sicat.R;
import com.example.sicat.controllers.SessionManager;

import org.w3c.dom.Text;

import butterknife.BindView;
import butterknife.ButterKnife;

public class FormOrderFinishActivity extends AppCompatActivity {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    Button btn_confirm;
    TextView txt_id_customer,txt_id_paket,txt_tgl_acara,txt_tgl_pemesanan,txt_tgl_pelunasan,txt_status;
    EditText txt_ket_acara;

    private DatePickerDialog datePickerDialog;
    private SimpleDateFormat dateFormatter;

    SessionManager sessionManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_form_order_finish);

        sessionManager = new SessionManager(this);

        txt_id_customer = (TextView) findViewById(R.id.txt_id_customer);
        txt_id_paket = (TextView) findViewById(R.id.txt_id_paket);
        txt_tgl_acara = (TextView) findViewById(R.id.txt_tgl_acara);
        txt_ket_acara = (EditText) findViewById(R.id.txt_ket_acara);
        txt_tgl_pemesanan = (TextView) findViewById(R.id.txt_tgl_pemesanan);
        txt_tgl_pelunasan = (TextView) findViewById(R.id.txt_tgl_pelunasan);
        txt_status = (TextView) findViewById(R.id.txt_status);

        // untuk menerima data dari session
        HashMap<String , String> customer = sessionManager.getCustomerDetail();
        String id_customer = customer.get(sessionManager.ID_CUSTOMER);
        HashMap<String , String> cart = sessionManager.getCartDetailPaket();
        String id_paket = cart.get(sessionManager.ID_PAKET);

        String jml_porsi = getIntent().getStringExtra("EXTRA_JML_PORSI");
        String tot_biaya = getIntent().getStringExtra("EXTRA_TOT_BIAYA");
        String tot_bayar = getIntent().getStringExtra("EXTRA_TOT_BAYAR");
        String kembalian = getIntent().getStringExtra("EXTRA_SISA_BAYAR");

        txt_id_customer.setText(id_customer);
        txt_id_paket.setText(id_paket);
        txt_status.setText("Belum Di Konfirmasi");

        Toast.makeText(this,jml_porsi+" "+tot_biaya+" "+tot_bayar+" "+kembalian,Toast.LENGTH_LONG).show();

        ButterKnife.bind(this);
        initActionBar();

        /**
         * Kita menggunakan format tanggal dd-MM-yyyy
         * jadi nanti tanggal nya akan diformat menjadi
         * misalnya 01-12-2017
         */
        dateFormatter = new SimpleDateFormat("dd-MM-yyyy", Locale.US);
        txt_tgl_acara.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showDateDialog();
            }
        });

        btn_confirm = (Button) findViewById(R.id.btn_confirm);
        btn_confirm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showDialog();
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

    private void showDialog(){
        AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(
                this);

        // set title dialog
        alertDialogBuilder.setTitle("Kirim Data Pemesanan ?");

        // set pesan dari dialog
        alertDialogBuilder
                .setMessage("Klik Ya untuk melakukan pemesanan !")
                .setPositiveButton("Ya",new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog,int id) {
                        // masuk form inputan transaksi pemesanan
                    }
                })
                .setNegativeButton("Tidak",new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        dialog.cancel();
                    }
                });

        // membuat alert dialog dari builder
        AlertDialog alertDialog = alertDialogBuilder.create();

        // menampilkan alert dialog
        alertDialog.show();
    }

    private void showDateDialog(){

        /**
         * Calendar untuk mendapatkan tanggal sekarang
         */
        Calendar newCalendar = Calendar.getInstance();
        txt_tgl_pemesanan.setText(dateFormatter.format(newCalendar.getTime()));

        /**
         * Initiate DatePicker dialog
         */
        datePickerDialog = new DatePickerDialog(this, new DatePickerDialog.OnDateSetListener() {

            @Override
            public void onDateSet(DatePicker view, int year, int monthOfYear, int dayOfMonth) {

                /**
                 * Method ini dipanggil saat kita selesai memilih tanggal di DatePicker
                 */

                /**
                 * Set Calendar untuk menampung tanggal yang dipilih
                 */
                Calendar newDate = Calendar.getInstance();
                newDate.set(year, monthOfYear, dayOfMonth);

                /**
                 * Update TextView dengan tanggal yang kita pilih
                 */
                txt_tgl_acara.setText(dateFormatter.format(newDate.getTime()));

                // mengatur -7 hari sebelum acara
                String acara = txt_tgl_acara.getText().toString().trim();
                String pelunasan = getCalculatedDate(acara,"dd-MM-yyyy",-7);
                txt_tgl_pelunasan.setText(pelunasan);
            }

        },newCalendar.get(Calendar.YEAR), newCalendar.get(Calendar.MONTH), newCalendar.get(Calendar.DAY_OF_MONTH));

        /**
         * Tampilkan DatePicker dialog
         */
        datePickerDialog.show();
    }

    public static String getCalculatedDate2(String dateFormat, int days) {
        Calendar cal = Calendar.getInstance();
        SimpleDateFormat s = new SimpleDateFormat(dateFormat);
        cal.add(Calendar.DAY_OF_YEAR, days);
        return s.format(new Date(cal.getTimeInMillis()));
    }

    public String getCalculatedDate(String date, String dateFormat, int days) {
        Calendar cal = Calendar.getInstance();
        SimpleDateFormat s = new SimpleDateFormat(dateFormat);

        cal.add(Calendar.DAY_OF_YEAR, days);
        try {
            Long x = s.parse(date).getTime();
            cal.setTimeInMillis(x);
            cal.add(Calendar.DAY_OF_YEAR, days);

            return s.format(new Date(cal.getTimeInMillis()));
        } catch (ParseException e) {
            // TODO Auto-generated catch block
            Log.e("TAG", "Error in Parsing Date : " + e.getMessage());
        }
        return null;
    }
}
