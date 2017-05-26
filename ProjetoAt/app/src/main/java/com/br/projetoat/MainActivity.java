package com.br.projetoat;

import android.app.AlertDialog;
import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.br.projetoat.controller.MainController;

import java.util.concurrent.ExecutionException;

import static java.security.AccessController.getContext;

public class MainActivity extends AppCompatActivity {

    private MainController mc = new MainController();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Button comecar = (Button) findViewById(R.id.comecar);
        comecar.setOnClickListener(onClickComecar());
    }

    private View.OnClickListener onClickComecar() {
        return new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                EditText editPin = (EditText) findViewById(R.id.editPin);
                String valida = editPin.getText().toString();

                Integer pin = Integer.parseInt(editPin.getText().toString());
                int validacao = 0;

                //http://codeoncloud.blogspot.com.br/2012/03/android-mysql-client.html
                try {
                    mc.validarPIN(pin);
                }catch (Exception e){
                    AlertDialog.Builder dialog = new AlertDialog.Builder(MainActivity.this);
                    dialog.setTitle("Erro");
                    dialog.setMessage(e.toString());
                    dialog.setNeutralButton("OK",null);
                    dialog.show();

                }
                if(validacao == pin){
                    if(valida.length() == 0){
                        editPin.setError("Preenchimento obrigatório!");
                        editPin.setFocusable(true);
                    }else{
                        //Integer pin = Integer.parseInt(editPin.getText().toString());
                        Intent intent = new Intent( getContext(),Questionario.class);
                        Bundle params = new Bundle();
                        params.putInt("pin",pin);
                        intent.putExtras(params);
                        startActivity(intent);
                    }
                }else{
                    editPin.setError("PIN incorreto!");
                    editPin.setFocusable(true);
                }


            }
        };
    }
    private Context getContext(){
        return this;
    }

}
