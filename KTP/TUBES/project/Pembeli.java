
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author ShiningA
 */
public class Pembeli implements PembeliInterface{
    Connection connection = null;
    public Pembeli(){
        connection = MysqlUtility.getConnection();
    }
    public void add(PembeliTO pembeli){
        Statement statement = null;
        
        try{
            statement = connection.createStatement();
            String sql = "INSERT into pembeli(idpembeli,namapembeli) VALUES (" + pembeli.getId() + ",'"+ pembeli.getNama() +"')";
            if(statement.executeUpdate(sql) > 0){
                System.out.println("Berhasil Insert");
            }else{
                System.out.println("Gagal Insert");
            }
        }catch(SQLException ex){
            System.out.println("ex:" + ex.getMessage());
        }finally{
            if(statement != null){
                try{
                    statement.close();
                }catch(SQLException ex){
                    System.out.println("ex:" + ex.getMessage());
                }
            }
        }
    }
    public void delete(int id){
        Statement statement = null;
        try{
            statement = connection.createStatement();
            String sql = "DELETE FROM pembeli WHERE idpembeli="+ id;
            if(statement.executeUpdate(sql) > 0){
                System.out.println("Berhasil DELETE");
            }else{
                System.out.println("Gagal DELETE");
            }
        }catch(SQLException ex){
            System.out.println("ex:" + ex.getMessage());
        }finally{
            if(statement != null){
                try{
                    statement.close();
                }catch(SQLException ex){
                    System.out.println("ex:" + ex.getMessage());
                }
            }
        }
    }
    public void update(PembeliTO pembeli){
        Statement statement = null;
        try {
            statement = connection.createStatement();
            String sql = "UPDATE pembeli SET namapembeli='" + pembeli.getNama() + "' WHERE idpembeli='" + pembeli.getId() + "'";
            if (statement.executeUpdate(sql) > 0) {
                System.out.println("Berhasil update");
            } else {
                System.out.println("Gagal update");
            }
        } catch (SQLException ex) {
            System.out.println("SQLException: " + ex.getMessage());
        } finally {
            if (statement != null) {
                try {
                    statement.close();
                } catch (SQLException ex) {
                    System.out.println("Gagal menutup statement");
                }
            }
        }
    }
    public List<PembeliTO> getAll(){
        Statement statement = null;
        ResultSet result = null;
        List<PembeliTO> list = new ArrayList<>();
        try{
            statement = connection.createStatement();
            String sql = "SELECT * FROM pembeli";
            result = statement.executeQuery(sql);
            while(result.next()){
                PembeliTO pembeli = new PembeliTO();
                pembeli.setId(result.getInt("idpembeli"));
                pembeli.setNama(result.getString("namapembeli"));
                list.add(pembeli);
            }
            return list;
        }catch (SQLException ex) {
            System.out.println("SQLException: " + ex.getMessage());
            System.out.println("Objek Statement berhasil dibuat");
            System.out.println("Objek Statement gagal dibuat");
            return null;
        } finally {
            if (statement != null) {
                try {
                    statement.close();
                } catch (SQLException ex) {
                    System.out.println("Gagal menutup statement");
                }
            }
            if (result != null) {
                try {
                    result.close();
                } catch (SQLException ex) {
                    System.out.println("ResultSet gagal ditutup");
                }
            }
        }
    }
}
