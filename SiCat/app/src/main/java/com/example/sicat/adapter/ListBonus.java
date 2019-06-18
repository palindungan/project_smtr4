package com.example.sicat.adapter;

import android.content.Context;
import android.content.Intent;
import android.media.Image;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.sicat.Database.ModelDB.Cart;
import com.example.sicat.R;
import com.example.sicat.activities.CartActivity;
import com.example.sicat.common.Common;
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

                int id  = sessionManager.getIdTabel();

                //ambil dari model
                String id_menu = dataModelArrayList.get(position).getId_menu();
                String nm_menu = dataModelArrayList.get(position).getNm_menu();
                String nm_kat = dataModelArrayList.get(position).getNm_kat();
                String tipe = dataModelArrayList.get(position).getTipe();
                int hrg_porsi = dataModelArrayList.get(position).getHrg_porsi();
                String gambar = dataModelArrayList.get(position).getGambar();
                String deskripsi = dataModelArrayList.get(position).getDeskripsi();
                String id_bonus = dataModelArrayList.get(position).getId_bonus();
                String id_kat = dataModelArrayList.get(position).getId_kat();

                // create new cart item
                Cart cartItem = new Cart();
                cartItem.id = id;
                cartItem.id_menu = id_menu;
                cartItem.nm_menu = nm_menu;
                cartItem.nm_kat = nm_kat;
                cartItem.tipe = tipe;
                cartItem.hrg_porsi = hrg_porsi;
                cartItem.gambar = gambar;
                cartItem.deskripsi = deskripsi;
                cartItem.id_bonus = id_bonus;
                cartItem.id_kat = id_kat;

                Common.cartRepository.updateCart(cartItem);

                sessionManager.setDataGanti(false,id,false);

                Toast.makeText(context,"ADD TO CART Berhasil!" , Toast.LENGTH_SHORT).show();

                Intent intent = new Intent(context, CartActivity.class);
                context.startActivity(intent);

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
