package com.br.projetoat.controller;


import com.br.projetoat.dao.Conexao;
import com.br.projetoat.model.ModelQuestionario;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

public class QuestionarioController{

    private Connection connection;

    public QuestionarioController(){

        connection = Conexao.getConnection();
    }

    public void inserirNota(ModelQuestionario m){
        try{
            PreparedStatement preparedStatement = connection.prepareStatement("INSERT INTO notas (atendente, problema_resolvido, tempo_espera) VALUES (?,?,?)");

            preparedStatement.setInt(1, m.getNotaAtendimento());
            preparedStatement.setInt(2, m.getNotaResulucao());
            preparedStatement.setInt(3, m.getNotaTempo());

            preparedStatement.executeUpdate();

        }catch (SQLException e){
            e.printStackTrace();
        }
    }



}
