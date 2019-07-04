package com.example.sicat.adapter;

import android.content.Context;
import android.media.Image;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.sicat.R;
import com.example.sicat.controllers.SessionManager;
import com.example.sicat.model.DetailTransaksi;
import com.squareup.picasso.Picasso;

import org.w3c.dom.Text;

import java.util.ArrayList;

import butterknife.ButterKnife;

public class TransaksiListDetailItemAdapter extends RecyclerView.Adapter<TransaksiListDetailItemAdapter.DetailViewHolder> {

    Context context;
    ArrayList<DetailTransaksi> dataModelArrayList;

    SessionManager sessionManager;

    private static ClickListener clickListener;

    public TransaksiListDetailItemAdapter(Context context, ArrayList<DetailTransaksi> dataModelArrayList) {
        this.context = context;
        this.dataModelArrayList = dataModelArrayList;

        // inisialisasi objek session
        sessionManager = new SessionManager(context);
    }

    @NonNull
    @Override
    public DetailViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View itemView = LayoutInflater.from(context).inflate(R.layout.transaksi_list_item_detail_layout,viewGroup,false);
        return new DetailViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull DetailViewHolder detailViewHolder, int i) {

        detailViewHolder.txt_product_name.setText(dataModelArrayList.get(i).getNm_menu());
        detailViewHolder.txt_product_kat.setText(dataModelArrayList.get(i).getNm_kat());
        detailViewHolder.txt_product_tipe.setText(dataModelArrayList.get(i).getTipe());

        //  Picasso.get().load(dataModelArrayList.get(position).getGambar()).into(holder.img_product);
        Picasso.get().load(dataModelArrayList.get(i).getGambar()).into(detailViewHolder.img_product);

    }

    @Override
    public int getItemCount() {
        return dataModelArrayList.size();
    }

    public class DetailViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener{

        TextView txt_product_name,txt_product_kat,txt_product_tipe;

        ImageView img_product;

        public DetailViewHolder(@NonNull View itemView) {
            super(itemView);

            txt_product_name =(TextView) itemView.findViewById(R.id.txt_product_name);
            txt_product_kat =(TextView) itemView.findViewById(R.id.txt_product_kat);
            txt_product_tipe =(TextView) itemView.findViewById(R.id.txt_product_tipe);

            img_product = (ImageView) itemView.findViewById(R.id.img_product);

            ButterKnife.bind(this, itemView);
            itemView.setOnClickListener(this);
        }

        @Override
        public void onClick(View v) {
            clickListener.onClick(v, getAdapterPosition());
        }
    }

    public void setOnItemClickListener(ClickListener clickListener) {
        TransaksiListDetailItemAdapter.clickListener = clickListener;
    }


    public interface ClickListener {
        void onClick(View view, int position);
    }
}
