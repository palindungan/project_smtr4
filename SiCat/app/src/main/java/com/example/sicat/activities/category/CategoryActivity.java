package com.example.sicat.activities.category;

import android.content.Intent;
import android.support.design.widget.TabLayout;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;

import com.example.sicat.R;
import com.example.sicat.activities.daftar_menu.MenuActivity;
import com.example.sicat.adapter.ViewPagerCategoryAdapter;
import com.example.sicat.model.Categories;

import java.util.List;

import butterknife.BindView;
import butterknife.ButterKnife;

public class CategoryActivity extends AppCompatActivity {

    // TODO 4. Annotate fields with @BindView and a view ID
    @BindView(R.id.toolbar)
    Toolbar toolbar;
    @BindView(R.id.tabLayout)
    TabLayout tabLayout;
    @BindView(R.id.viewPager)
    ViewPager viewPager;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_category);

        //TODO 5. Bind ButterKnife
        ButterKnife.bind(this);

        initActionBar();

        // TODO 9. Init GetIntent() data from home activity
        initIntent();

    }

    private void initIntent() {

        Intent intent = getIntent();
        List<Categories.Category> categories = (List<Categories.Category>) intent.getSerializableExtra(MenuActivity.EXTRA_CATEGORY);
        int position = intent.getIntExtra(MenuActivity.EXTRA_POSITION,0);

        // TODO 11. Declare fragment viewPager adapter
        ViewPagerCategoryAdapter adapter = new ViewPagerCategoryAdapter(getSupportFragmentManager(),categories);
        viewPager.setAdapter(adapter);
        tabLayout.setupWithViewPager(viewPager);
        viewPager.setCurrentItem(position,true);
        adapter.notifyDataSetChanged();
    }

    private void initActionBar(){
        setSupportActionBar(toolbar);
        if(getSupportActionBar() != null){
            getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        }
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        switch (item.getItemId()){
            case android.R.id.home:
                onBackPressed();
                break;
        }
        return true;
    }
}
