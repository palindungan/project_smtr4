package com.example.sicat.activities.daftar_menu;

import android.app.AlertDialog;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.View;

import com.example.sicat.R;
import com.example.sicat.Utils;
import com.example.sicat.adapter.RecyclerViewMenuAdapter;
import com.example.sicat.adapter.ViewPagerHeaderAdapter;
import com.example.sicat.model.Categories;
import com.example.sicat.model.Meals;

import java.util.List;

import butterknife.BindView;
import butterknife.ButterKnife;


// TODO 31 implement the MenuView interface at the end
public class MenuActivity extends AppCompatActivity implements MenuView {

    /*
     * TODO 32 Add @BindView Annotation (1)
     *
     * 1. viewPagerHeader
     * 2. recyclerCategory
     *
     */

    @BindView(R.id.viewPagerHeader) ViewPager viewPagerMeal;
    @BindView(R.id.recycleCategory) RecyclerView recyclerViewCategory;

    /*
     *  TODO 33 Create variable for presenter;
     */
    MenuPresenter presenter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        /*
         *  TODO 34 bind the ButterKnife (2)
         */
        ButterKnife.bind(this);

        /*
         *  TODO 35 Declare the presenter
         *  new HomePresenter(this)
         */
        presenter = new MenuPresenter(this);
        presenter.getMeals();
        presenter.getCategories();

    }

    // TODO 36 Overriding the interface

    @Override
    public void showLoading() {

        findViewById(R.id.shimmerMeal).setVisibility(View.VISIBLE);
        findViewById(R.id.shimmerCategory).setVisibility(View.VISIBLE);

    }

    @Override
    public void hideLoading() {

        findViewById(R.id.shimmerMeal).setVisibility(View.GONE);
        findViewById(R.id.shimmerCategory).setVisibility(View.GONE);
    }

    @Override
    public void setMeal(List<Meals.Meal> meal) {
        ViewPagerHeaderAdapter headerAdapter = new ViewPagerHeaderAdapter(meal,this);
        viewPagerMeal.setAdapter(headerAdapter);
        viewPagerMeal.setPadding(20,0,150,0);
        headerAdapter.notifyDataSetChanged();
    }

    @Override
    public void setCategory(List<Categories.Category> category) {
        RecyclerViewMenuAdapter menuAdapter = new RecyclerViewMenuAdapter(category,this);
        recyclerViewCategory.setAdapter(menuAdapter);
        GridLayoutManager layoutManager = new GridLayoutManager(this,3, GridLayoutManager.VERTICAL,false);
        recyclerViewCategory.setLayoutManager(layoutManager);
        recyclerViewCategory.setNestedScrollingEnabled(true);
        menuAdapter.notifyDataSetChanged();
    }

    @Override
    public void onErrorLoading(String message) {

        Utils.showDialogMessage(this,"Tittle", message);

    }
}
