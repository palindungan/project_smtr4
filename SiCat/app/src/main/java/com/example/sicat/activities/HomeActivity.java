package com.example.sicat.activities;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.nfc.Tag;
import android.provider.MediaStore;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.design.widget.NavigationView;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Base64;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
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

import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;

import de.hdodenhof.circleimageview.CircleImageView;

public class HomeActivity extends AppCompatActivity {

    // deklarasi
    SessionManager sessionManager; // session
    String getID;

    private Button btn_photo; // btn upload
    private Bitmap bitmap;
    CircleImageView profile_image;

    // deklarasi untuk drawer
    private DrawerLayout dl;
    private ActionBarDrawerToggle t;
    private NavigationView nv;

    private static String URL_UPLOAD ="http://192.168.56.1/project_smtr4/api/transaksi/upload_gambar/";
    private static final String TAG = HomeActivity.class.getSimpleName(); // getting the info

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        // inisialisasi ojek session
        sessionManager = new SessionManager(this);
        // untuk menerima data dari session
        HashMap<String , String> customer = sessionManager.getCustomerDetail();
        getID = customer.get(sessionManager.ID_CUSTOMER);

        btn_photo = findViewById(R.id.btn_photo); // button untuk upload
        profile_image = findViewById(R.id.profile_image); // untuk gambar yang ingin di upload

        // untuk drawer
        dl = (DrawerLayout) findViewById(R.id.activity_home);
        t = new ActionBarDrawerToggle(this, dl, R.string.Open, R.string.Close);

        dl.addDrawerListener(t);
        t.syncState();

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        nv = (NavigationView) findViewById(R.id.nv);

        nv.setNavigationItemSelectedListener(new NavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                int id = item.getItemId();
                switch (id) {
                    case R.id.account:
                        startActivity(new Intent(HomeActivity.this, AccountActivity.class));
                        break;
                    case R.id.log_out:
                        sessionManager.logout();
                        break;
                    default:
                        return true;
                }
                return true;
            }
        });

        btn_photo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                chooseFile();
            }
        });
    }

    // method untuk aksi option menu (jika di pilih / click)
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        if (t.onOptionsItemSelected(item)) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    // untuk menampilkan layar pilih gambar
    private void chooseFile(){
        Intent intent = new Intent();
        intent.setType("image/*");
        intent.setAction(Intent.ACTION_GET_CONTENT);
        startActivityForResult(Intent.createChooser(intent,"Pilih Gambar"),1);
    }

    // proses pengolahan gambar
    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if(requestCode == 1 && resultCode == RESULT_OK && data != null && data.getData() != null){
            Uri filePath = data.getData();
            try {

                bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(),filePath);
                profile_image.setImageBitmap(bitmap);
            } catch (IOException e) {
                e.printStackTrace();
            }

            UploadPicture(getID,getStringImage(bitmap));
        }
    }

    // proses dengan API
    private void UploadPicture(final String id,final String photo) {

        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Uploading...");
        progressDialog.show();

        StringRequest stringRequest =  new StringRequest(Request.Method.POST, URL_UPLOAD,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();
                        Log.i(TAG,response.toString());
                        try {
                            JSONObject jsonObject = new JSONObject(response);
                            String success = jsonObject.getString("success");

                            if (success.equals("1")){
                                Toast.makeText(HomeActivity.this,"success",Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                            Toast.makeText(HomeActivity.this,"Try Again ! "+e.toString(),Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        progressDialog.dismiss();
                        Toast.makeText(HomeActivity.this,"Try Again "+error.toString(),Toast.LENGTH_SHORT).show();
                    }
        })
        {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> params = new HashMap<>();
                params.put("id",id);
                params.put("photo",photo);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);

    }

    // mengkonversi Bitmap ke String
    public String getStringImage(Bitmap bitmap){

        ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
        bitmap.compress(Bitmap.CompressFormat.JPEG,100,byteArrayOutputStream);

        byte[] imageByteArray = byteArrayOutputStream.toByteArray();
        String encodedImage = Base64.encodeToString(imageByteArray,Base64.DEFAULT);

        return encodedImage;
    }
}
