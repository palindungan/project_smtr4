package com.example.sicat.adapter;

import android.content.Context;
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
import com.squareup.picasso.Picasso;

import java.util.List;

public class CartAdapter extends RecyclerView.Adapter<CartAdapter.CartViewHolder> {

    Context context;
    List<Cart> cartList;

    public CartAdapter(Context context, List<Cart> cartList) {
        this.context = context;
        this.cartList = cartList;
    }

    @NonNull
    @Override
    public CartViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View itemView = LayoutInflater.from(context).inflate(R.layout.cart_item_layout,parent,false);
        return new CartViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull CartViewHolder holder, int position) {
        // set data disini
        // Picasso.get().load(strCategoryThum).placeholder(R.drawable.ic_circle).into(viewHolder.categoryThumb);
        Picasso.get().load(cartList.get(position).gambar).into(holder.img_product);
        holder.txt_product_name.setText(cartList.get(position).nm_menu);
        holder.txt_product_kat.setText(cartList.get(position).nm_kat);
        holder.txt_product_tipe.setText(cartList.get(position).tipe);
    }

    @Override
    public int getItemCount() {
        return cartList.size();
    }

    class CartViewHolder extends RecyclerView.ViewHolder
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
}
