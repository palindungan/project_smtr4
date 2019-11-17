package com.example.sicat.activities;

import android.app.DatePickerDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.provider.MediaStore;
import android.support.annotation.Nullable;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.util.Base64;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Locale;
import java.util.Map;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sicat.Database.ModelDB.Cart;
import com.example.sicat.R;
import com.example.sicat.common.Common;
import com.example.sicat.controllers.Base_url;
import com.example.sicat.controllers.SessionManager;

import org.json.JSONException;
import org.json.JSONObject;
import org.w3c.dom.Text;

import butterknife.BindView;
import butterknife.ButterKnife;
import io.reactivex.android.schedulers.AndroidSchedulers;
import io.reactivex.disposables.CompositeDisposable;
import io.reactivex.functions.Consumer;
import io.reactivex.schedulers.Schedulers;

public class FormOrderFinishActivity extends AppCompatActivity {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    Button btn_confirm;
    TextView txt_id_customer, txt_id_paket, txt_tgl_acara, txt_tgl_pemesanan, txt_tgl_pelunasan, txt_status;
    EditText txt_ket_acara;
    Button btn_photo;

    ImageView upload_image;
    private Bitmap bitmap;

    private DatePickerDialog datePickerDialog;
    private SimpleDateFormat dateFormatter;

    SessionManager sessionManager;

    Base_url base_url = new Base_url();
    String url = base_url.getUrl();


    private String URL_UPLOAD = url + "transaksi/Data_prasmanan/";
    private String URL_UPLOAD_DETAIL = url + "transaksi/Data_prasmanan_detail/";
    private static final String TAG = FormOrderFinishActivity.class.getSimpleName(); // getting the info

    List<Cart> cartList = new ArrayList<>();

    CompositeDisposable compositeDisposable;

    String data_photo;

    String id_customer;
    String id_paket;
    String jml_porsi;
    String tot_biaya;
    String tot_bayar;
    String kembalian;

    String id_prasmanan;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_form_order_finish);

        sessionManager = new SessionManager(this);
        compositeDisposable = new CompositeDisposable();

        dateFormatter = new SimpleDateFormat("yyyy-MM-dd", Locale.US);//"dd-MM-yyyy" "yyyy-MM-dd"

        txt_id_customer = (TextView) findViewById(R.id.txt_id_customer);
        txt_id_paket = (TextView) findViewById(R.id.txt_id_paket);
        txt_tgl_acara = (TextView) findViewById(R.id.txt_tgl_acara);
        txt_ket_acara = (EditText) findViewById(R.id.txt_ket_acara);
        txt_tgl_pemesanan = (TextView) findViewById(R.id.txt_tgl_pemesanan);
        txt_tgl_pelunasan = (TextView) findViewById(R.id.txt_tgl_pelunasan);
        txt_status = (TextView) findViewById(R.id.txt_status);
        upload_image = (ImageView) findViewById(R.id.upload_image);
        btn_photo = (Button) findViewById(R.id.btn_photo);

        // untuk menerima data dari session
        HashMap<String, String> customer = sessionManager.getCustomerDetail();
        id_customer = customer.get(sessionManager.ID_CUSTOMER);
        HashMap<String, String> cart = sessionManager.getCartDetailPaket();
        id_paket = cart.get(sessionManager.ID_PAKET);

        jml_porsi = getIntent().getStringExtra("EXTRA_JML_PORSI");
        tot_biaya = getIntent().getStringExtra("EXTRA_TOT_BIAYA");
        tot_bayar = getIntent().getStringExtra("EXTRA_TOT_BAYAR");
        kembalian = getIntent().getStringExtra("EXTRA_SISA_BAYAR");

        txt_id_customer.setText(id_customer);
        txt_id_paket.setText(id_paket);
        Calendar newCalendar2 = Calendar.getInstance();
        txt_tgl_pemesanan.setText(dateFormatter.format(newCalendar2.getTime()));
        txt_status.setText("Pending");

        //Toast.makeText(this,jml_porsi+" "+tot_biaya+" "+tot_bayar+" "+kembalian,Toast.LENGTH_LONG).show();

        ButterKnife.bind(this);
        initActionBar();

        /**
         * Kita menggunakan format tanggal dd-MM-yyyy
         * jadi nanti tanggal nya akan diformat menjadi
         * misalnya 01-12-2017
         */

        txt_tgl_acara.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showDateDialog();
            }
        });

        btn_photo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                chooseFile();
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

    private void showDialog() {
        AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(
                this);

        // set title dialog
        alertDialogBuilder.setTitle("Kirim Data Pemesanan ?");

        // set pesan dari dialog
        alertDialogBuilder
                .setMessage("Klik Ya untuk melakukan pemesanan !")
                .setPositiveButton("Ya", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        // masuk form inputan transaksi pemesanan

                        String ket_acara = txt_ket_acara.getText().toString().trim();
                        String tgl_pelunasan = txt_tgl_pelunasan.getText().toString().trim();
                        String tgl_acara = txt_tgl_acara.getText().toString().trim();
                        // data_photo

                        try {
                            // validasi
                            if (!ket_acara.isEmpty() && !tgl_pelunasan.isEmpty() && !tgl_acara.isEmpty() && !data_photo.isEmpty()) {
                                // jika benar
                                // data prasmanan
                                UploadData(data_photo);
                            } else {

                                Toast.makeText(FormOrderFinishActivity.this, "Isi Data Dengan Benar", Toast.LENGTH_SHORT).show();

                            }

                        } catch (Exception e) {
                            Toast.makeText(FormOrderFinishActivity.this, "Isi Data Dengan Benar", Toast.LENGTH_SHORT).show();
                        }

                    }
                })
                .setNegativeButton("Tidak", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int id) {
                        dialog.cancel();
                    }
                });

        // membuat alert dialog dari builder
        AlertDialog alertDialog = alertDialogBuilder.create();

        // menampilkan alert dialog
        alertDialog.show();
    }

    private void showDateDialog() {

        /**
         * Calendar untuk mendapatkan tanggal sekarang
         */
        Calendar newCalendar = Calendar.getInstance();

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
                String pelunasan = getCalculatedDate(acara, "yyyy-MM-dd", -7);
                txt_tgl_pelunasan.setText(pelunasan);
            }

        }, newCalendar.get(Calendar.YEAR), newCalendar.get(Calendar.MONTH), newCalendar.get(Calendar.DAY_OF_MONTH));

        /**
         * Tampilkan DatePicker dialog
         */
        datePickerDialog.show();
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

    // untuk menampilkan layar pilih gambar
    private void chooseFile() {
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent, "Pilih Gambar"), 1);
    }

    // proses pengolahan gambar
    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == 1 && resultCode == RESULT_OK && data != null && data.getData() != null) {
            Uri filePath = data.getData();
            try {

                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), filePath);
                upload_image.setImageBitmap(bitmap);
            } catch (IOException e) {
                e.printStackTrace();
            }

            data_photo = getStringImage(bitmap);
        }
    }

    // proses dengan API
    private void UploadData(String photo) {

        String ket_acara = txt_ket_acara.getText().toString().trim();
        String tgl_pemesanan = txt_tgl_pemesanan.getText().toString().trim();
        String tgl_pelunasan = txt_tgl_pelunasan.getText().toString().trim();
        String tgl_acara = txt_tgl_acara.getText().toString().trim();
        String status = "pending";

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_UPLOAD,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.i(TAG, response.toString());
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success"); //id_prasmanan
                            if (success.equals("1")) {

                                id_prasmanan = jsonObject.getString("id_prasmanan");

                                // data detail prasmanan
                                compositeDisposable.add(
                                        Common.cartRepository.getCartItems()
                                                .observeOn(AndroidSchedulers.mainThread())
                                                .subscribeOn(Schedulers.io())
                                                .subscribe(new Consumer<List<Cart>>() {
                                                    @Override
                                                    public void accept(List<Cart> carts) throws Exception {
                                                        cartList = carts;
                                                        int count = Common.cartRepository.countCartItems();

                                                        for (int i = 0; i < count; i++) {
                                                            String id_menu = cartList.get(i).id_menu;
                                                            String id_bonus = cartList.get(i).id_bonus;

                                                            Log.d("cobaa", id_prasmanan + " " + id_menu + " " + id_bonus);
                                                            UploadDataDetail(id_prasmanan, id_menu, id_bonus);
                                                        }

                                                        Common.cartRepository.emptyCart();
                                                        sessionManager.setCart(false, "KOSONG", "KOSONG", "KOSONG", "KOSONG", "KOSONG");
                                                        sessionManager.setDataGanti(false, 0, false);
                                                        Intent intent2 = new Intent(FormOrderFinishActivity.this, HomeActivity.class);
                                                        startActivity(intent2);
                                                        compositeDisposable.clear();
                                                    }
                                                })
                                );

                                Toast.makeText(FormOrderFinishActivity.this, "success", Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(FormOrderFinishActivity.this, "Try Again ! " + e.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(FormOrderFinishActivity.this, "Try Again " + error.toString(), Toast.LENGTH_SHORT).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id_customer", id_customer);
                params.put("id_paket", id_paket);
                params.put("jml_porsi", jml_porsi);
                params.put("tot_biaya", tot_biaya);
                params.put("tot_dp", tot_bayar);
                params.put("sisa_bayar", kembalian);
                params.put("photo", photo);
                params.put("ket_acara", ket_acara);
                params.put("tgl_pemesanan", tgl_pemesanan);
                params.put("tgl_pelunasan", tgl_pelunasan);
                params.put("tgl_acara", tgl_acara);
                params.put("status", status);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }

    private void UploadDataDetail(String id_prasmanan, String id_menu, String id_bonus) {

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_UPLOAD_DETAIL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        Log.i(TAG, response.toString());
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if (success.equals("1")) {
                                Toast.makeText(FormOrderFinishActivity.this, "success", Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(FormOrderFinishActivity.this, "Try Again ! " + e.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(FormOrderFinishActivity.this, "Try Again volley error " + error.toString(), Toast.LENGTH_SHORT).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id_prasmanan", id_prasmanan);
                params.put("id_menu", id_menu);
                params.put("id_bonus", id_bonus);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }

    // mengkonversi Bitmap ke String
    public String getStringImage(Bitmap bitmap) {

        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStream);

        byte[] imageByteArray = byteArrayOutputStream.toByteArray();
        String encodedImage = Base64.encodeToString(imageByteArray, Base64.DEFAULT);

        return encodedImage;
    }


}
