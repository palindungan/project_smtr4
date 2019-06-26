package com.example.sicat.adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.sicat.R;
import com.example.sicat.controllers.SessionManager;
import com.example.sicat.model.Transaksi;

import java.util.ArrayList;

import butterknife.ButterKnife;

public class TransaksiListAdapter extends RecyclerView.Adapter<TransaksiListAdapter.TransaksiViewHolder> {

    Context context;
    ArrayList<Transaksi> dataModelArrayList;

    SessionManager sessionManager;

    private static ClickListener clickListener;

    public TransaksiListAdapter(Context context, ArrayList<Transaksi> dataModelArrayList) {
        this.context = context;
        this.dataModelArrayList = dataModelArrayList;

        // inisialisasi objek session
        sessionManager = new SessionManager(context);
    }

    @NonNull
    @Override
    public TransaksiViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View itemView = LayoutInflater.from(context).inflate(R.layout.transaksi_list_item_layout,viewGroup,false);
        //View itemView = LayoutInflater.from(context).inflate(R.layout.,parent,false);
        return new TransaksiViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull TransaksiViewHolder transaksiViewHolder, int i) {

        //dataModelArrayList.get(position).getNm_menu()
        transaksiViewHolder.txt_id_prasmanan.setText("KODE PRASMANAN : "+dataModelArrayList.get(i).getId_prasmanan());
        transaksiViewHolder.txt_nm_paket.setText("NAMA PAKET : "+dataModelArrayList.get(i).getNm_paket());

        String status = dataModelArrayList.get(i).getStatus();

        if(status.equals("belum_lunas")){
            transaksiViewHolder.txt_status.setText("STATUS : Belum Lunas");
        }else if(status.equals("pending")){
            transaksiViewHolder.txt_status.setText("STATUS : Pending");
        }
    }

    @Override
    public int getItemCount() {
        return dataModelArrayList.size();
    }

    public class TransaksiViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener{

        TextView txt_id_prasmanan,txt_nm_paket,txt_status;

        public TransaksiViewHolder(@NonNull View itemView) {
            super(itemView);

            txt_id_prasmanan = (TextView) itemView.findViewById(R.id.txt_id_prasmanan);
            txt_nm_paket = (TextView) itemView.findViewById(R.id.txt_nm_paket);
            txt_status = (TextView) itemView.findViewById(R.id.txt_status);

            ButterKnife.bind(this, itemView);
            itemView.setOnClickListener(this);
        }

        @Override
        public void onClick(View v) {
            clickListener.onClick(v, getAdapterPosition());
        }
    }

    public void setOnItemClickListener(ClickListener clickListener) {
        TransaksiListAdapter.clickListener = clickListener;
    }


    public interface ClickListener {
        void onClick(View view, int position);
    }
}
