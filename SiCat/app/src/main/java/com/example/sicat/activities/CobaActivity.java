package com.example.sicat.activities;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.sicat.R;
import com.example.sicat.adapter.ListAdapter;
import com.example.sicat.model.ModelDaftarMenu;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class CobaActivity extends AppCompatActivity {

    private static ProgressDialog mProgressDialog;
    private ListView listView;

    ArrayList<ModelDaftarMenu> dataModelArrayList;

    private ListAdapter listAdapter;

    private String URLstring = "http://192.168.56.1/project_smtr4/api/daftar_menu/get_detail_menu/";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_coba);

        listView = findViewById(R.id.lv);
        retrieveJSON();
    }

    private void retrieveJSON() {
        showSimpleProgressDialog(this, "Loading...", "Fetching Json", false);
        StringRequest stringRequest = new StringRequest(Request.Method.GET, URLstring, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Log.d("strrrrr", ">>" + response);
                try {
                    JSONObject obj = new JSONObject(response);
                    if (obj.optString("success").equals("1")) {
                        dataModelArrayList = new ArrayList<>();
                        JSONArray dataArray = obj.getJSONArray("meals");
                        for (int i = 0; i < dataArray.length(); i++) {
                            ModelDaftarMenu playerModel = new ModelDaftarMenu();
                            JSONObject dataobj = dataArray.getJSONObject(i);
                            playerModel.setNm_menu(dataobj.getString("nm_menu"));
                            playerModel.setNm_kat(dataobj.getString("nm_kat"));
                            playerModel.setTipe(dataobj.getString("tipe"));
                            playerModel.setGambar(dataobj.getString("gambar"));
                            //playerModel.setImgURL(dataobj.getString("imgURL"));
                            dataModelArrayList.add(playerModel);
                        }
                        setupListview();
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
//displaying the error in toast if occurrs
                        Toast.makeText(getApplicationContext(), error.getMessage(), Toast.LENGTH_SHORT).show();
                    }
                });
// request queue
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    private void setupListview() {
        removeSimpleProgressDialog();
        //will remove progress dialog
        listAdapter = new ListAdapter(this, dataModelArrayList);
        listView.setAdapter(listAdapter);
    }

    public static void removeSimpleProgressDialog() {
        try {
            if (mProgressDialog != null) {
                if (mProgressDialog.isShowing()) {
                    mProgressDialog.dismiss();
                    mProgressDialog = null;
                }
            }
        } catch (IllegalArgumentException ie) {
            ie.printStackTrace();
        } catch (RuntimeException re) {
            re.printStackTrace();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public static void showSimpleProgressDialog(Context context, String title, String msg, boolean isCancelable) {
        try {
            if (mProgressDialog == null) {
                mProgressDialog = ProgressDialog.show(context, title, msg);
                mProgressDialog.setCancelable(isCancelable);
            }
            if (!mProgressDialog.isShowing()) {
                mProgressDialog.show();
            }
        } catch (IllegalArgumentException ie) {
            ie.printStackTrace();
        } catch (RuntimeException re) {
            re.printStackTrace();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
