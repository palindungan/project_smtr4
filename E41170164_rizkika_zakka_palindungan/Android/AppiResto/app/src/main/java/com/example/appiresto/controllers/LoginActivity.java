package com.example.appiresto.controllers;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

// import tambahan
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.support.design.widget.TextInputLayout;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;
// import tambahan

import com.example.appiresto.R;

public class LoginActivity extends AppCompatActivity {
    // deklarasi Objek
    TextInputLayout validasiIDUser, validasiPassword;
    EditText txtIDUser, txtPassword;
    Button btnLogin;
    TextView txtRegistrasi;

    // deklarasi variabel
    String id_user, password;

    // deklarasi variabel alamat host dan ini variable digunakan di method login
    public static String URL = "http://192.168.1.135/api_android/iresto/login.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        // inisialisasi
        validasiIDUser = findViewById(R.id.validasiIDUser);
        validasiPassword = findViewById(R.id.validasiPassword);
        txtIDUser = findViewById(R.id.txtIDUser);
        txtPassword = findViewById(R.id.txtPassword);
        btnLogin = findViewById(R.id.btnLogin);
        txtRegistrasi = findViewById(R.id.txtRegister);

        // jika tombol login diklik
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // mengmbil data dari input di konversi ke String, trim  untuk memotong karakter-karakter spasi pada bagian awal dan akhir
                id_user = txtIDUser.getText().toString().trim();
                password = txtPassword.getText().toString().trim();

                // validasi didalam form tidak boleh kosong dan konfirmasi diisi dengan benar
                if (id_user.isEmpty()) {
                    validasiIDUser.setError("ID. User harus diisi!");
                } else if (password.isEmpty()) {
                    validasiIDUser.setError("Password harus diisi!");
                } else {
                    // melakukan pengecekan dan validasi Asli/keAslian User
                    auth_user(id_user, password);
                }
            }
        });

        // jika tombol register diklik
        txtRegistrasi.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // sintak untuk pindah activity
                Intent intent = new Intent(LoginActivity.this, RegisterActivity.class);
                LoginActivity.this.startActivity(intent);
            }
        });
    }

    // method login
    private void auth_user(final String id_user, final String password) {

        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");
                            JSONArray jsonArray = jsonObject.getJSONArray("login");
                            if (success.equals("1")) {
                                for (int i = 0; i < jsonArray.length(); i++) {
                                    JSONObject jsonObject1 = jsonArray.getJSONObject(i);

                                    String nama_user = jsonObject1.getString("nama_user").trim();
                                    Toast.makeText(LoginActivity.this,
                                            "Login berhasil ! \n Nama : " + nama_user,
                                            Toast.LENGTH_SHORT)
                                            .show();
                                }
                            } else {
                                Toast.makeText(LoginActivity.this,
                                        "ID. User dan Password tidak ditemukan! ",
                                        Toast.LENGTH_SHORT)
                                        .show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(LoginActivity.this,
                                    "Error login : " + e.toString(),
                                    Toast.LENGTH_SHORT)
                                    .show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(LoginActivity.this,
                                "Error login : " + error.toString(),
                                Toast.LENGTH_SHORT)
                                .show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id_user", id_user);     // sesuaikan dengan $_POST pada PHP
                params.put("password", password);
                return params;
            }
        };

        // disini action queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }
}
