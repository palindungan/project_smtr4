package com.example.sicat.adapter;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.sicat.Database.ModelDB.Cart;
import com.example.sicat.R;
import com.example.sicat.activities.CartActivity;
import com.example.sicat.activities.DaftarBonusActivity;
import com.example.sicat.activities.daftar_menu.MenuActivity;
import com.example.sicat.common.Common;
import com.example.sicat.controllers.SessionManager;
import com.squareup.picasso.Picasso;

import java.util.List;

public class CartAdapter extends RecyclerView.Adapter<CartAdapter.CartViewHolder> {

    Context context;
    List<Cart> cartList;

    CartActivity cartActivity = new CartActivity();

    SessionManager sessionManager;

    public CartAdapter(Context context, List<Cart> cartList) {
        this.context = context;
        this.cartList = cartList;

        // inisialisasi objek session
        sessionManager = new SessionManager(context);
    }

    @NonNull
    @Override
    public CartViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(context).inflate(R.layout.cart_item_layout,parent,false);
        return new CartViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull CartViewHolder holder, int position) {
        Cart deletedItem = cartList.get(position);
        int id_tabel = cartList.get(position).id;
        String id_bonus = cartList.get(position).id_bonus;

        // set data disini
        Picasso.get().load(cartList.get(position).gambar).into(holder.img_product);

        // jika hanya menu biasa
        switch (id_bonus)
        {
            case "kosong":

                holder.txt_product_name.setText(cartList.get(position).nm_menu);
                holder.btn_ubah.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        // set session
                        sessionManager.setDataGanti(true,id_tabel,false);

                        // ganti activity
                        Intent intent =  new Intent(context, MenuActivity.class);
                        context.startActivity(intent);
                    }
                });

                break;

            default:
                // jika menu bonus
                holder.txt_product_name.setText(cartList.get(position).nm_menu+" (Bonus)");
                holder.btn_ubah.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View v) {
                        // set session
                        sessionManager.setDataGanti(false,id_tabel,true);

                        // ganti activity
                        Intent intent =  new Intent(context, DaftarBonusActivity.class);
                        context.startActivity(intent);
                    }
                });
        }

        // holder.txt_product_name.setText(cartList.get(position).nm_menu);
        holder.txt_product_kat.setText(cartList.get(position).nm_kat);
        holder.txt_product_tipe.setText(cartList.get(position).tipe);

    }

    @Override
    public int getItemCount() {
        return cartList.size();
    }

    public class CartViewHolder extends RecyclerView.ViewHolder
    {
        ImageView img_product;
        TextView txt_product_name,txt_product_kat,txt_product_tipe;
        Button btn_ubah;

        public CartViewHolder(@NonNull View itemView) {
            super(itemView);

            img_product = (ImageView)itemView.findViewById(R.id.img_product);
            txt_product_name = (TextView)itemView.findViewById(R.id.txt_product_name);
            txt_product_kat = (TextView)itemView.findViewById(R.id.txt_product_kat);
            txt_product_tipe = (TextView)itemView.findViewById(R.id.txt_product_tipe);
            btn_ubah = (Button)itemView.findViewById(R.id.btn_ubah);
        }
    }

    public void removeItem(int position)
    {
        cartList.remove(position);
        notifyItemRemoved(position);
    }
}
