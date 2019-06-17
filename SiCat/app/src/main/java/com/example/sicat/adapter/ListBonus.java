package com.example.sicat.adapter;

import android.content.Context;
import android.media.Image;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.sicat.R;
import com.example.sicat.controllers.SessionManager;
import com.example.sicat.model.Bonus;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

public class ListBonus extends BaseAdapter {

    private Context context;
    private ArrayList<Bonus> dataModelArrayList;
    SessionManager sessionManager; // session
    // private static String URL_BONUS="http://192.168.56.1/project_smtr4/api/transaksi/Get_paket_by_id"; // url http request

    public ListBonus(Context context, ArrayList<Bonus> dataModelArrayList) {
        this.context = context;
        this.dataModelArrayList = dataModelArrayList;

        // inisialisasi objek session
        sessionManager = new SessionManager(context);
    }

    @Override
    public int getCount() {
        return dataModelArrayList.size();
    }

    @Override
    public Object getItem(int position) {
        return dataModelArrayList.get(position);
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder holder;
        if (convertView == null) {
            holder = new ViewHolder();
            LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = inflater.inflate(R.layout.item_daftar_bonus, null, true);
            holder.img_product = (ImageView) convertView.findViewById(R.id.img_product);
            holder.txt_product_name = (TextView) convertView.findViewById(R.id.txt_product_name);
            holder.txt_product_kat = (TextView) convertView.findViewById(R.id.txt_product_kat);
            holder.txt_product_tipe = (TextView) convertView.findViewById(R.id.txt_product_tipe);
            holder.btn_pilih = (Button) convertView.findViewById(R.id.btn_pilih);
            convertView.setTag(holder);
        } else {
            // the getTag returns the viewHolder object set as a tag to the view
            holder = (ViewHolder) convertView.getTag();
        }
        // Compiler akan mengatur gambar ini di imageview.

        // untuk kondisi ada button pilih / tidak
        Boolean status = sessionManager.getGantiBonus();
        if(status==false){
            holder.btn_pilih.setVisibility(View.GONE);
        }else {
            holder.btn_pilih.setVisibility(View.VISIBLE);
        }

        //Picasso.get().load(cartList.get(position).gambar).into(holder.img_product);
        Picasso.get().load(dataModelArrayList.get(position).getGambar()).into(holder.img_product);

        // Kemudian akan mengatur informasi lain di tampilan teks masing-masing.
        holder.txt_product_name.setText(dataModelArrayList.get(position).getNm_menu());
        holder.txt_product_kat.setText(dataModelArrayList.get(position).getNm_kat());
        holder.txt_product_tipe.setText(dataModelArrayList.get(position).getTipe());

        holder.btn_pilih.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
//                Boolean status = true;
//                String id_paket = dataModelArrayList.get(position).getId_paket();
//                String nm_paket = dataModelArrayList.get(position).getNm_paket();
//                String hrg_paket = String.valueOf(dataModelArrayList.get(position).getHrg_paket());
//                String jml_menu = String.valueOf(dataModelArrayList.get(position).getJml_menu());
//                String jml_bonus = String.valueOf(dataModelArrayList.get(position).getJml_bonus());
//                sessionManager.setCart(status,id_paket,nm_paket,hrg_paket,jml_menu,jml_bonus);
//
//                retrieveJSON(id_paket);
//
//                Intent intent = new Intent(context,CartActivity.class);
//                context.startActivity(intent); // membuka activity lain
            }
        });

        return convertView;
    }

    // tambahan
    @Override
    public int getViewTypeCount() {
        return getCount();
    }

    @Override
    public int getItemViewType(int position) {
        return position;
    }

    private class ViewHolder {
        protected ImageView img_product;
        protected TextView txt_product_name, txt_product_kat, txt_product_tipe;
        protected Button btn_pilih;
    }
}
