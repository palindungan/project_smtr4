package com.example.sicat.activities;

import android.app.ProgressDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sicat.R;
import com.example.sicat.controllers.SessionManager;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import butterknife.BindView;
import butterknife.ButterKnife;

public class AccountActivity extends AppCompatActivity {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    // deklarasi
    private Spinner jenkel_customer;
    String jenkel[]={"Pilih Jenis Kelamin","Pria","Wanita"};
    ArrayAdapter<String> adapter;
    String record= "";

    private EditText id_customer , nm_customer , almt_customer, no_hp , email , username , password ,c_password;
    private Button btn_save, btn_cancel;
    SessionManager sessionManager;
    String getID;
    private static final String TAG = AccountActivity.class.getSimpleName(); // getting the info
    private static String URL_READ = "http://192.168.56.1/project_smtr4/api/crud_customer/Read_detail_customer/";
    private static String URL_EDIT ="http://192.168.56.1/project_smtr4/api/crud_customer/Edit_detail_customer/";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_account);

        // inisialisasi objek session
        sessionManager = new SessionManager(this);
        sessionManager.checkLogin(); // untuk mengecek apakah sudah login apa belum

        // inisialisasi
        nm_customer = findViewById(R.id.nm_customer);
        almt_customer = findViewById(R.id.almt_customer);
        no_hp = findViewById(R.id.no_hp);
        email = findViewById(R.id.email);
        username = findViewById(R.id.username);
        password = findViewById(R.id.password);
        c_password = findViewById(R.id.c_password);

        // button
        btn_save = findViewById(R.id.btn_save);
        btn_cancel = findViewById(R.id.btn_cancel);

        // select option
        jenkel_customer = (Spinner)findViewById(R.id.jenkel_customer);
        adapter = new ArrayAdapter<String>(this,android.R.layout.simple_list_item_1,jenkel);
        jenkel_customer.setAdapter(adapter);
        jenkel_customer.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {

                switch (position)
                {
                    case 0:

                        record = "";

                        break;

                    case 1:

                        record = "pria";

                        break;

                    case 2:

                        record = "wanita";

                        break;
                }

            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

        // untuk menerima data dari session
        HashMap<String , String> customer = sessionManager.getCustomerDetail();
        getID = customer.get(sessionManager.ID_CUSTOMER);

        btn_save.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                // ambil data di inputan dimasukkan kedalam variable
                String m_nm_customer = nm_customer.getText().toString().trim();
                String m_almt_customer = almt_customer.getText().toString().trim();
                String m_jenkel_customer = record;
                String m_no_hp = no_hp.getText().toString().trim();
                String m_email =email.getText().toString().trim();
                String m_username = username.getText().toString().trim();
                String m_password = password.getText().toString().trim();
                String m_c_password = c_password.getText().toString().trim();

                // validasi
                if (!m_nm_customer.isEmpty() && !m_almt_customer.isEmpty()&& !m_jenkel_customer.isEmpty()&& !m_no_hp.isEmpty() && !m_email.isEmpty()&& !m_username.isEmpty() && !m_password.isEmpty() && !m_c_password.isEmpty()){
                    // jika benar
                    SaveEditDetail();
                } else {
                    // jika salah
                    nm_customer.setError("Masukkan Nama Anda");
                    almt_customer.setError("Masukkan Alamat");

                    if (m_jenkel_customer.isEmpty()){
                        Toast.makeText(AccountActivity.this,"Isikan Jenis Kelamin",Toast.LENGTH_SHORT).show();
                    }

                    no_hp.setError("Masukkan No Hp");

                    email.setError("Masukkan Email");
                    username.setError("Masukkan Username");

                    password.setError("Masukkan Password");
                    c_password.setError("Masukkan Konfirmasi Password");
                }


            }
        });

        btn_cancel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                getUserDetail();

                password.setText("");
                c_password.setText("");
            }
        });

        ButterKnife.bind(this);
        initActionBar();

    }

    // mengambil detail user
    private void getUserDetail(){
        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Loading...");
        progressDialog.show();

        StringRequest stringRequest =  new StringRequest(Request.Method.POST, URL_READ,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();
                        Log.i(TAG,response.toString());

                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            JSONArray jsonArray = jsonObject.getJSONArray("read");

                            if (success.equals("1")){
                                for (int i = 0 ; i<jsonArray.length();i++) {

                                    JSONObject object = jsonArray.getJSONObject(i);

                                    String o_nm_customer = object.getString("nm_customer").trim();
                                    String o_almt_customer = object.getString("almt_customer").trim();
                                    String o_jenkel_customer = object.getString("jenkel_customer").trim();
                                    String o_no_hp = object.getString("no_hp").trim();
                                    String o_email = object.getString("email").trim();
                                    String o_username = object.getString("username").trim();
                                    // String o_password = object.getString("password").trim();

                                    nm_customer.setText(o_nm_customer);
                                    almt_customer.setText(o_almt_customer);

                                    switch (o_jenkel_customer)
                                    {
                                        case "pria":

                                            jenkel_customer.setSelection(1);
                                            record = "pria";
                                            break;

                                        case "wanita":

                                            jenkel_customer.setSelection(2);
                                            record = "wanita";
                                            break;
                                    }

                                    no_hp.setText(o_no_hp);
                                    email.setText(o_email);
                                    username.setText(o_username);
                                    // password.setText(o_password);
                                }
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            progressDialog.dismiss();
                            Toast.makeText(AccountActivity.this,"Error Reading Detail"+e.toString(),Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        progressDialog.dismiss();
                        Toast.makeText(AccountActivity.this,"Error Volley Reading Detail"+error.toString(),Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> params = new HashMap<>();
                params.put("id_customer",getID);

                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    @Override
    protected void onResume() {
        super.onResume();
        getUserDetail();
    }

    // menyimpan data
    private void SaveEditDetail(){

        final String nm_customer = this.nm_customer.getText().toString().trim();
        final String almt_customer = this.almt_customer.getText().toString().trim();
        final String jenkel_customer = record;
        final String no_hp = this.no_hp.getText().toString().trim();
        final String email = this.email.getText().toString().trim();
        final String username = this.username.getText().toString().trim();
        final String password = this.password.getText().toString().trim();

        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Saving...");
        progressDialog.show();

        StringRequest stringRequest =  new StringRequest(Request.Method.POST, URL_EDIT,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();

                        try{
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if (success.equals("1")){
                                Toast.makeText(AccountActivity.this,"Berhasil terupdate",Toast.LENGTH_SHORT).show();
                                sessionManager.createSession(getID,nm_customer,almt_customer,jenkel_customer,no_hp,email,username);
                            }

                        }catch (JSONException e){
                            e.printStackTrace();
                            progressDialog.dismiss();
                            Toast.makeText(AccountActivity.this,"Error api"+e.toString(),Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        progressDialog.dismiss();
                        Toast.makeText(AccountActivity.this,"Error Volley"+error.toString(),Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> params = new HashMap<>();
                params.put("id_customer",getID);
                params.put("nm_customer",nm_customer);
                params.put("almt_customer",almt_customer);
                params.put("jenkel_customer",jenkel_customer);
                params.put("no_hp",no_hp);
                params.put("email",email);
                params.put("username",username);
                params.put("password",password);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

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
