package com.example.appiresto.controllers;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

// import tambahan
import android.support.design.widget.TextInputLayout;

import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;
// import tambahan

import com.example.appiresto.R;

public class RegisterActivity extends AppCompatActivity {

    // deklarasi variable yang akan digunakan (onjek di layout)
    private EditText txtIDUser, txtNamaUser, txtPassword, txtKonfirmasiPassword;
    private TextInputLayout validasiIDUser, validasiNamaUser,
            validasiPassword, validasiKonfirmasiPassword;
    private Button btnRegister;
    private ProgressBar loading;

    // ip address laptop/pc yang anda miliki dan ini variable digunakan di method register
    private static String URL = "http://192.168.1.135/api_android/iresto/register.php";

    // deklarasi variable yang akan digunakan (variable)
    private String id_user, nama_user, password, konfirmasi_password;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        // inisialisasi objek
        txtIDUser = findViewById(R.id.txtIDUser);
        txtNamaUser = findViewById(R.id.txtNamaUser);
        txtPassword = findViewById(R.id.txtPassword);
        txtKonfirmasiPassword = findViewById(R.id.txtKonfirmasiPassword);

        validasiIDUser = findViewById(R.id.validasiIDUser);
        validasiNamaUser = findViewById(R.id.validasiNamaUser);
        validasiPassword = findViewById(R.id.validasiPassword);
        validasiKonfirmasiPassword = findViewById(R.id.validasiKonfirmasiPassword);

        btnRegister = findViewById(R.id.btnRegister);
        loading = findViewById(R.id.loading);

        // Listener jika button diKlik btnRegister
        btnRegister.setOnClickListener(new View.OnClickListener() {

            // method onCLick
            @Override
            public void onClick(View view) {
                // mengmbil data dari input di konversi ke String, trim  untuk memotong karakter-karakter spasi pada bagian awal dan akhir
                id_user = txtIDUser.getText().toString().trim();
                nama_user = txtNamaUser.getText().toString().trim();
                password = txtPassword.getText().toString().trim();
                konfirmasi_password = txtKonfirmasiPassword.getText().toString().trim();

                // validasi didalam form tidak boleh kosong dan konfirmasi diisi dengan benar
                if (id_user.isEmpty()) {
                    validasiIDUser.setError("ID. User harus diisi!");
                } else if (nama_user.isEmpty()) {
                    validasiNamaUser.setError("Nama User harus diisi!");
                } else if (password.isEmpty()) {
                    validasiPassword.setError("Password harus diisi!");
                } else if (!konfirmasi_password.equals(password)) {
                    validasiKonfirmasiPassword.setError("Konfirmasi password harus sama!");
                } else {
                    Registrasi();
                }

            }
        });

    }

    // method registrasi
    private void Registrasi() {

        // untuk menampilkan objek
        loading.setVisibility(View.VISIBLE);

        // untuk menghilangkan objek beserta tempatnya / tidak akan ada space (secara komplit)
        btnRegister.setVisibility(View.GONE);

        // mengmbil data dari txtIDUser di konversi ke String, trim  untuk memotong karakter-karakter spasi pada bagian awal dan akhir
        id_user = this.txtIDUser.getText().toString().trim();
        nama_user = this.txtNamaUser.getText().toString().trim();
        password = this.txtPassword.getText().toString().trim();
        konfirmasi_password = this.txtKonfirmasiPassword.getText().toString().trim();

        // Library volley merupakan library yang berfokus untuk membantu koneksi ke API menjadi jauh lebih mudah.
        // untuk mengambil data string apapun, dan responnya bisa berupa JSON, XML, HTML, maupun teks.
        // dibawah ini adalah POST REQUEST
        StringRequest stringRequest = new StringRequest(StringRequest.Method.POST, URL,
                new Response.Listener<String>() {

                    // method untuk respon
                    @Override
                    public void onResponse(String response) {
                        try {
                            // Mengkonvert String ke JSONObjek
                            JSONObject jsonObject = new JSONObject(response);

                            // mengambil jsonObject yang bernama success
                            String success = jsonObject.getString("success");
                            if (success.equals("1")) {
                                Toast.makeText(RegisterActivity.this, "Register Success!", Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(RegisterActivity.this, "Register Error : " + e.toString(), Toast.LENGTH_SHORT).show();

                            // menghilangkan loading
                            loading.setVisibility(View.GONE);

                            // menampilkan button register
                            btnRegister.setVisibility(View.VISIBLE);
                        }
                    }

                },
                new Response.ErrorListener() {

                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(RegisterActivity.this, "Register Error : " + error.toString(), Toast.LENGTH_SHORT).show();

                        // menghilangkan loading
                        loading.setVisibility(View.GONE);

                        // menampilkan button register
                        btnRegister.setVisibility(View.VISIBLE);

                    }
                }
        ) {
            //For a POST request, to add form parameters/values, the getParams() method needs to be overridden and a Map needs to be returned.
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("id_user", id_user);
                params.put("nama_user", nama_user);
                params.put("password", password);
                return params;
            }
        };

        // disini action queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }
}
