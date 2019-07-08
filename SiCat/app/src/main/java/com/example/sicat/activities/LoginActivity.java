package com.example.sicat.activities;

import android.content.Intent;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
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

public class LoginActivity extends AppCompatActivity {

    // deklarasi variable
    private EditText username , password; // text input
    private Button btn_login; // btn login
    private ProgressBar loading; // loading
    private static String URL_LOGIN="http://192.168.56.1/project_smtr4/api/login/login/"; // url http request
    SessionManager sessionManager; // session

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        // inisialisasi objek session
        sessionManager = new SessionManager(this);

        // inisialisasi
        username = findViewById(R.id.username);
        password = findViewById(R.id.password);

        btn_login = findViewById(R.id.btn_login);
        loading = findViewById(R.id.loading);

        btn_login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // ambil data di inputan dimasukkan kedalam variable
                String mUsername = username.getText().toString().trim();
                String mPassword = password.getText().toString().trim();

                // validasi
                if (!mUsername.isEmpty() && !mPassword.isEmpty()){
                    // jika benar
                    login(mUsername , mPassword);
                } else {
                    // jika salah
                    username.setError("Masukkan Username");
                    password.setError("Masukkan Password");
                }
            }
        });
    }

    private void login(final String username , final String password) {

        loading.setVisibility(View.VISIBLE);
        btn_login.setVisibility(View.GONE);

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_LOGIN,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            JSONArray jsonArray = jsonObject.getJSONArray("login");

                            if(success.equals("1")){
                                for (int i = 0 ; i < jsonArray.length() ; i++){
                                    JSONObject object = jsonArray.getJSONObject(i);

                                    // mengambil data dari api
                                    String id_customer = object.getString("id_customer").trim();
                                    String nm_customer = object.getString("nm_customer").trim();
                                    String almt_customer = object.getString("almt_customer").trim();
                                    String jenkel_customer = object.getString("jenkel_customer").trim();
                                    String no_hp = object.getString("no_hp").trim();
                                    String email = object.getString("email").trim();

                                    // untuk memanggil session dan mengirim data untuk disimpan
                                    sessionManager.createSession(id_customer,nm_customer,almt_customer,jenkel_customer,no_hp,email,username);

                                    // data yang akan dikirim ke dalam intent / halaman lain
                                    Intent intent = new Intent(LoginActivity.this,HomeActivity.class);
                                    startActivity(intent); // membuka activity lain

                                    loading.setVisibility(View.GONE);
                                    btn_login.setVisibility(View.VISIBLE);
                                }
                            }

                        } catch (JSONException e) {
                            e.printStackTrace();
                            loading.setVisibility(View.GONE);
                            btn_login.setVisibility(View.VISIBLE);
                            Toast.makeText(LoginActivity.this ," Terjadi Kesalahan :"+e.toString(),Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        loading.setVisibility(View.GONE);
                        btn_login.setVisibility(View.VISIBLE);
                        Toast.makeText(LoginActivity.this ,"Isi Username Dan Password Dengan Benar "+error.toString(),Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("username",username);
                params.put("password",password);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }
}
