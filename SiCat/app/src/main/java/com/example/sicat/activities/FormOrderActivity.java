package com.example.sicat.activities;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;

import com.example.sicat.R;
import com.example.sicat.common.Common;

import butterknife.BindView;
import butterknife.ButterKnife;

public class FormOrderActivity extends AppCompatActivity {

    @BindView(R.id.toolbar)
    Toolbar toolbar;

    Button btn_next;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_form_order);

        ButterKnife.bind(this);
        initActionBar();

        btn_next = (Button)findViewById(R.id.btn_next);

        btn_next.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(FormOrderActivity.this,FormOrderFinishActivity.class);
                startActivity(intent);
            }
        });
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
