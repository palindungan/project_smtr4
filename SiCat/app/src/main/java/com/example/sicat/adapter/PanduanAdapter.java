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
import com.example.sicat.model.Panduan;

import java.util.ArrayList;

import butterknife.ButterKnife;

public class PanduanAdapter extends RecyclerView.Adapter<PanduanAdapter.PanduanViewHolder> {

    Context context;
    ArrayList<Panduan> dataModelArrayList;

    SessionManager sessionManager;

    private static ClickListener clickListener;

    public PanduanAdapter(Context context, ArrayList<Panduan> dataModelArrayList) {
        this.context = context;
        this.dataModelArrayList = dataModelArrayList;

        // inisialisasi objek session
        sessionManager = new SessionManager(context);
    }

    @NonNull
    @Override
    public PanduanViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {

        View itemView = LayoutInflater.from(context).inflate(R.layout.item_panduan,viewGroup,false);
        return new PanduanViewHolder(itemView);
    }

    @Override
    public void onBindViewHolder(@NonNull PanduanViewHolder panduanViewHolder, int i) {
        panduanViewHolder.txt_deskripsi.setText(dataModelArrayList.get(i).getDeskripsi());
    }

    @Override
    public int getItemCount() {
        return dataModelArrayList.size();
    }

    public class PanduanViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        TextView txt_deskripsi;

        public PanduanViewHolder(@NonNull View itemView) {
            super(itemView);

            txt_deskripsi = (TextView) itemView.findViewById(R.id.txt_deskripsi);

            ButterKnife.bind(this, itemView);
            itemView.setOnClickListener(this);
        }

        @Override
        public void onClick(View v) {
            clickListener.onClick(v, getAdapterPosition());
        }
    }

    public void setOnItemClickListener(ClickListener clickListener) {
        PanduanAdapter.clickListener = clickListener;
    }

    public interface ClickListener {
        void onClick(View view, int position);
    }
}
