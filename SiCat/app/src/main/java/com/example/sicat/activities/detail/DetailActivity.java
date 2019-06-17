package com.example.sicat.activities.detail;

import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.PorterDuff;
import android.graphics.drawable.Drawable;
import android.net.Uri;
import android.support.design.widget.AppBarLayout;
import android.support.design.widget.CollapsingToolbarLayout;
import android.support.v4.view.ViewCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import com.example.sicat.Database.ModelDB.Cart;
import com.example.sicat.R;
import com.example.sicat.Utils;
import com.example.sicat.activities.CartActivity;
import com.example.sicat.common.Common;
import com.example.sicat.controllers.SessionManager;
import com.example.sicat.model.Meals;
import com.google.gson.Gson;
import com.squareup.picasso.Picasso;

import java.util.HashMap;
import java.util.Map;

import butterknife.BindView;
import butterknife.ButterKnife;

import static com.example.sicat.activities.daftar_menu.MenuActivity.EXTRA_DETAIL;

public class DetailActivity extends AppCompatActivity implements DetailView {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    @BindView(R.id.appbar)
    AppBarLayout appBarLayout;

    @BindView(R.id.collapsing_toolbar)
    CollapsingToolbarLayout collapsingToolbarLayout;

    @BindView(R.id.mealThumb)
    ImageView mealThumb;

    @BindView(R.id.category)
    TextView category;

    @BindView(R.id.country)
    TextView country;

    @BindView(R.id.instructions)
    TextView instructions;

    @BindView(R.id.hrg_porsi)
    TextView hrg_porsi;

    @BindView(R.id.progressBar)
    ProgressBar progressBar;

    @BindView(R.id.btn_add_cart)
    Button btn_add_cart;

    SessionManager sessionManager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail);

        // inisialisasi session
        sessionManager = new SessionManager(this);

        ButterKnife.bind(this);

        setupActionBar();

        //TODO #9 Get data from the intent
        Intent intent = getIntent();
        String mealName = intent.getStringExtra(EXTRA_DETAIL);

        //TODO #10 Declare the presenter (put the name of the meal name from the data intent to the presenter)
        DetailPresenter presenter = new DetailPresenter(this);
        presenter.getMealById(mealName);
    }

    private void setupActionBar() {
        setSupportActionBar(toolbar);
        collapsingToolbarLayout.setContentScrimColor(getResources().getColor(R.color.colorWhite));
        collapsingToolbarLayout.setCollapsedTitleTextColor(getResources().getColor(R.color.colorPrimary));
        collapsingToolbarLayout.setExpandedTitleColor(getResources().getColor(R.color.colorWhite));
        if (getSupportActionBar() != null) {
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        }
    }

    void setupColorActionBarIcon(Drawable favoriteItemColor) {
        appBarLayout.addOnOffsetChangedListener((appBarLayout, verticalOffset) -> {
            if ((collapsingToolbarLayout.getHeight() + verticalOffset) < (2 * ViewCompat.getMinimumHeight(collapsingToolbarLayout))) {
                if (toolbar.getNavigationIcon() != null)
                    toolbar.getNavigationIcon().setColorFilter(getResources().getColor(R.color.colorPrimary), PorterDuff.Mode.SRC_ATOP);
                favoriteItemColor.mutate().setColorFilter(getResources().getColor(R.color.colorPrimary),
                        PorterDuff.Mode.SRC_ATOP);

            } else {
                if (toolbar.getNavigationIcon() != null)
                    toolbar.getNavigationIcon().setColorFilter(getResources().getColor(R.color.colorWhite), PorterDuff.Mode.SRC_ATOP);
                favoriteItemColor.mutate().setColorFilter(getResources().getColor(R.color.colorWhite),
                        PorterDuff.Mode.SRC_ATOP);
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_detail, menu);
        MenuItem favoriteItem = menu.findItem(R.id.favorite);
        Drawable favoriteItemColor = favoriteItem.getIcon();
        setupColorActionBarIcon(favoriteItemColor);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()) {
            case android.R.id.home :
                onBackPressed();
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
    }

    @Override
    public void showLoading() {
        progressBar.setVisibility(View.VISIBLE);
    }

    @Override
    public void hideLoading() {
        progressBar.setVisibility(View.INVISIBLE);
    }

    @Override
    public void setMeal(Meals.Meal meal) {
        //Log.w("TAG",meal.getStrMeal());

        Picasso.get().load(meal.getGambar()).into(mealThumb);
        collapsingToolbarLayout.setTitle(meal.getNmMenu());
        category.setText(meal.getNmKat());
        country.setText(meal.getTipe());
        instructions.setText(meal.getDeskripsi());
        hrg_porsi.setText(meal.getHrgPorsi());
        setupActionBar();

        String id_menu = meal.getIdMenu();
        String nm_menu = meal.getNmMenu();
        String nm_kat = meal.getNmKat();
        String tipe = meal.getTipe();
        String hrg_porsi = meal.getHrgPorsi();
        String gambar = meal.getGambar();
        String deskripsi = meal.getDeskripsi();
        String id_kat = meal.getIdKat();

        Map<String,String> params = new HashMap<>();
        params.put("id_menu",id_menu);
        params.put("nm_menu",nm_menu);
        params.put("nm_kat",nm_kat);
        params.put("tipe",tipe);
        params.put("hrg_porsi",hrg_porsi);
        params.put("gambar",gambar);
        params.put("deskripsi",deskripsi);
        params.put("id_kat",id_kat);

        Boolean status = sessionManager.getGantiStatus();
        if(status==false){
            btn_add_cart.setVisibility(View.GONE);
        }else {
            btn_add_cart.setVisibility(View.VISIBLE);
        }

        btn_add_cart.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showAddToCartDialog(params);
                // Toast.makeText(DetailActivity.this,"Add to Cart Berhasil!" , Toast.LENGTH_SHORT).show();
            }
        });

        //===
//        youtube.setOnClickListener(v -> {
//            Intent intentYoutube = new Intent(Intent.ACTION_VIEW);
//            intentYoutube.setData(Uri.parse(meal.getStrYoutube()));
//            startActivity(intentYoutube);
//        });
//
//        source.setOnClickListener(v -> {
//            Intent intentSource = new Intent(Intent.ACTION_VIEW);
//            intentSource.setData(Uri.parse(meal.getStrSource()));
//            startActivity(intentSource);
//        });
    }

    @Override
    public void onErrorLoading(String message) {
        Utils.showDialogMessage(this,"Error",message);
    }

    private void showAddToCartDialog(Map<String, String> params){
        AlertDialog.Builder builder = new AlertDialog.Builder(DetailActivity.this);
        View itemView = LayoutInflater.from(DetailActivity.this).inflate(R.layout.add_to_cart_layout,null);

        // view
        ImageView img_product_dialog = (ImageView) itemView.findViewById(R.id.img_cart_product);
        TextView txt_id_dialog = (TextView) itemView.findViewById(R.id.txt_cart_product_id);
        TextView txt_name_dialog = (TextView) itemView.findViewById(R.id.txt_cart_name);
        TextView txt_kat_dialog = (TextView) itemView.findViewById(R.id.txt_cart_kat);

        // set data
        Picasso.get().load(params.get("gambar")).into(img_product_dialog);
        txt_id_dialog.setText(params.get("id_menu"));
        txt_name_dialog.setText(params.get("nm_menu"));
        txt_kat_dialog.setText(params.get("nm_kat"));

        builder.setView(itemView);
        builder.setNegativeButton("CANCEL", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.dismiss();
            }
        });
        builder.setPositiveButton("ADD to Cart", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                int id  = sessionManager.getIdTabel();

                // create new cart item
                Cart cartItem = new Cart();
                cartItem.id = id;
                cartItem.id_menu = params.get("id_menu");
                cartItem.nm_menu = params.get("nm_menu");
                cartItem.nm_kat = params.get("nm_kat");
                cartItem.tipe = params.get("tipe");
                cartItem.hrg_porsi = Integer.parseInt(params.get("hrg_porsi"));
                cartItem.gambar = params.get("gambar");
                cartItem.deskripsi = params.get("deskripsi");
                cartItem.id_bonus = "kosong";
                cartItem.id_kat = params.get("id_kat");

                Common.cartRepository.updateCart(cartItem);

                sessionManager.setDataGanti(false,id,false);

                Toast.makeText(DetailActivity.this,"Add to Cart Berhasil!" , Toast.LENGTH_SHORT).show();

                Intent intent = new Intent(DetailActivity.this, CartActivity.class);
                startActivity(intent);

            }
        });
        builder.show();
    }
}
