package com.br.projetoat;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

import com.br.projetoat.dao.Configuracao;
import com.br.projetoat.dao.RequestHandler;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class MainActivity extends AppCompatActivity{

    //Declarando os objetos
    private EditText editPin;
    private Button comecar;
    private Button sobre;

    //String que recebera o pin
    private String id_pin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //Iniciando uma intent para a proxima tela
        Intent intent = getIntent();

        //Inciializando objetos
        comecar = (Button) findViewById(R.id.comecar);
        editPin = (EditText) findViewById(R.id.editPin);
        id_pin = intent.getStringExtra(Configuracao.PIN);
        sobre = (Button) findViewById(R.id.sobre);

        comecar.setOnClickListener(onClickComecar());
        sobre.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, Sobre.class);
                startActivity(intent);
            }
        });
    }

    private View.OnClickListener onClickComecar() {
        return new View.OnClickListener(){

            @Override
            public void onClick(View v) {
                //Pegando o valor passado no campo PIN
                String valida = editPin.getText().toString();

                //Verificando se esta vazio o campo
                if(valida.length() == 0){
                    editPin.setError("Preenchimento obrigatório!");
                    editPin.setFocusable(true);
                }else {
                    id_pin = editPin.getText().toString();

                    //Metodo de validaçao do PIN
                    validarPIN();
                }
            }
        };
    }

    public void validarPIN(){

        //Fazendo requisiçao do Banco de dados para encontrar o valor do codigo salvo no banco
        class validarPin extends AsyncTask<Void, Void, String>{
            ProgressDialog loading;

            @Override
            protected void onPreExecute(){
                super.onPreExecute();
                loading = ProgressDialog.show(MainActivity.this, "Verificando PIN ...","Espere por favor...",false,false);
            }

            @Override
            protected void onPostExecute(String s){
                super.onPostExecute(s);
                loading.dismiss();
                //chamando o método para validar o PIN e tratar o erro
                resultadoPIN(s);
            }

            @Override
            protected String doInBackground(Void... v) {
                RequestHandler rh = new RequestHandler();
                String res = rh.sendGetRequestParams(Configuracao.URL_VALIDAR_PIN, id_pin);
                return res;
            }
        }
        validarPin vp = new validarPin();
        vp.execute();
    }

    private void resultadoPIN(String json) {
        try {
            //JSON retornado do PHP
            JSONObject jsonObject = new JSONObject(json);
            String pindb = (String) jsonObject.get("result");

            //Se o valor do PIN for nulo no banco de dados o PIN nao esta registrado na tabela do banco ou ja foi preenchido
            if(pindb.equals("0")){
                editPin.setError("PIN incorreto ou já preenchido!");
                editPin.setFocusable(true);
            }else{
                //Se retorna diferente de nulo é que o PIN foi registrado no Banco de Dados e não foi preenchido
                //Cira uma Intent para passar o valor do PIN para outra tela para ser utilizada
                Integer pin = Integer.parseInt(editPin.getText().toString());
                Intent intent = new Intent( getContext(),Questionario.class);
                Bundle params = new Bundle();
                params.putInt("pin",pin);
                intent.putExtras(params);
                startActivity(intent);
            }


        } catch (JSONException e) {
            e.printStackTrace();
        }
    }


    private Context getContext(){
        return this;
    }
}
