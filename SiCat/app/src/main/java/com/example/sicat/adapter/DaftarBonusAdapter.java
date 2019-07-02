package com.example.sicat.adapter;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
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

import butterknife.ButterKnife;

public class DaftarBonusAdapter extends RecyclerView.Adapter<DaftarBonusAdapter.DaftarViewHolder> {

    Context context;
    ArrayList<Bonus> dataModelArrayList;

    SessionManager sessionManager;

    private static ClickListener clickListener;

    public DaftarBonusAdapter(Context context, ArrayList<Bonus> dataModelArrayList) {
        this.context = context;
        this.dataModelArrayList = dataModelArrayList;

        // inisialisasi objek session
        sessionManager = new SessionManager(context);
    }

    @NonNull
    @Override
    public DaftarViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View itemView = LayoutInflater.from(context).inflate(R.layout.item_daftar_bonus,viewGroup,false);
        return new DaftarViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull DaftarViewHolder daftarViewHolder, int i) {

        // untuk kondisi ada button pilih / tidak
        Boolean status = sessionManager.getGantiBonus();
        if(status==false){
            daftarViewHolder.btn_pilih.setVisibility(View.GONE);
        }else {
            daftarViewHolder.btn_pilih.setVisibility(View.VISIBLE);
        }

        daftarViewHolder.txt_product_name.setText(dataModelArrayList.get(i).getNm_menu());
        Picasso.get().load(dataModelArrayList.get(i).getGambar()).into(daftarViewHolder.img_product);
        //  Picasso.get().load(strMealThumb).into(mealThumb);

        daftarViewHolder.btn_pilih.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                int id_tabel  = sessionManager.getIdTabel();

                //ambil dari model
                String id_menu = dataModelArrayList.get(i).getId_menu();
                String nm_menu = dataModelArrayList.get(i).getNm_menu();
                String nm_kat = dataModelArrayList.get(i).getNm_kat();
                String tipe = dataModelArrayList.get(i).getTipe();
                int hrg_porsi = dataModelArrayList.get(i).getHrg_porsi();
                String gambar = dataModelArrayList.get(i).getGambar();
                String deskripsi = dataModelArrayList.get(i).getDeskripsi();
                String id_bonus = dataModelArrayList.get(i).getId_bonus();
                String id_kat = dataModelArrayList.get(i).getId_kat();

                // dialog
                AlertDialog.Builder alertDialogBuilder = new AlertDialog.Builder(
                        context);
                // set title dialog
                alertDialogBuilder.setTitle("Memilih bonus menu "+nm_menu+" ?");
                // set pesan dari dialog
                alertDialogBuilder
                        .setPositiveButton("Ya",new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog,int id) {

                                // create new cart item
                                Cart cartItem = new Cart();
                                cartItem.id = id_tabel;
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
                        })
                        .setNegativeButton("Tidak",new DialogInterface.OnClickListener() {
                            public void onClick(DialogInterface dialog, int id) {
                                dialog.cancel();
                            }
                        });
                // membuat alert dialog dari builder
                AlertDialog alertDialog = alertDialogBuilder.create();
                // menampilkan alert dialog
                alertDialog.show();
                // end of dialog
            }
        });
    }

    @Override
    public int getItemCount() {
        return dataModelArrayList.size();
    }

    public class DaftarViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener{

        protected ImageView img_product;
        protected TextView txt_product_name;
        protected ImageView btn_pilih;

        public DaftarViewHolder(@NonNull View itemView) {
            super(itemView);

            img_product = (ImageView) itemView.findViewById(R.id.img_product);
            txt_product_name = (TextView) itemView.findViewById(R.id.txt_product_name);
            btn_pilih = (ImageView) itemView.findViewById(R.id.btn_pilih);

            ButterKnife.bind(this, itemView);
            itemView.setOnClickListener(this);
        }

        @Override
        public void onClick(View v) {
            clickListener.onClick(v, getAdapterPosition());
        }
    }

    public void setOnItemClickListener(ClickListener clickListener) {
        DaftarBonusAdapter.clickListener = clickListener;
    }


    public interface ClickListener {
        void onClick(View view, int position);
    }
}
