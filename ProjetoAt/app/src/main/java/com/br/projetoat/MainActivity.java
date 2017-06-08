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

    private EditText editPin;
    private Button comecar;

    private String id_pin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Intent intent = getIntent();



        //inciializando objetos
        comecar = (Button) findViewById(R.id.comecar);
        editPin = (EditText) findViewById(R.id.editPin);
        id_pin = intent.getStringExtra(Configuracao.PIN);

        comecar.setOnClickListener(onClickComecar());
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
                s = s.substring(0,s.length()-1);
                if(s.equals("{\"result\":[]}"))
                    s = "{\"result\":[{\"codigo\":\"null\"}]}";

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
            JSONObject jsonObject = new JSONObject(json);
            JSONArray result = jsonObject.getJSONArray(Configuracao.TAG_JSON_ARRAY);
            JSONObject c = result.getJSONObject(0);

            //Atribuindo valor do Array para string
            String pindb = c.getString(Configuracao.TAG_ID);

            //Se o valor do PIN for nulo no banco de dados o PIN nao esta registrado na tabela do banco
            if(pindb.equals("null")){
                editPin.setError("PIN incorreto!");
                editPin.setFocusable(true);
            }else{
                //Se retorna =! de nulo e que o PIN foi registrado no Banco de Dados
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
