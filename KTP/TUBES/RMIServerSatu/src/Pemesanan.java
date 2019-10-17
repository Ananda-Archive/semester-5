
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
public class Pemesanan implements PemesananInterface{
    Connection connection = null;
    public Pemesanan(){
        connection = MysqlUtility.getConnection();
    }
    public void add(PemesananTO pemesanan){
        Statement statement = null;
        
        try{
            statement = connection.createStatement();
            String sql = "INSERT into pemesanan(idpemesanan, idpembeli, idpesawat) VALUES ("+ pemesanan.getId() +","+ pemesanan.getPembeli().getId() +","+ pemesanan.getPesawat().getId() +")";
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
            String sql = "DELETE FROM pemesanan WHERE idpemesanan="+ id;
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
    public void update(PemesananTO pemesanan){
        Statement statement = null;
        try {
            statement = connection.createStatement();
            String sql = "UPDATE pemesanan SET idpembeli='" + pemesanan.getPembeli().getId() + "',idpesawat='"+ pemesanan.getPesawat().getId() +"'WHERE idpemesanan='" + pemesanan.getId() + "'";
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
    public List<PemesananTO> getAll(){
        Statement statement = null;
        ResultSet result = null;
        List<PemesananTO> list = new ArrayList<>();
        try{
            statement = connection.createStatement();
            String sql = "SELECT * FROM pemesanan JOIN pembeli ON pemesanan.idpembeli=pembeli.idpembeli JOIN pesawat ON pemesanan.idpesawat=pesawat.idpesawat ORDER BY idpemesanan ASC";
            result = statement.executeQuery(sql);
            while(result.next()){
                PembeliTO pembeli = new PembeliTO(0,"");
                PesawatTO pesawat = new PesawatTO(0,"");
                pembeli.setId(result.getInt("pembeli.idpembeli"));
                pembeli.setNama(result.getString("pembeli.namapembeli"));
                pesawat.setId(result.getInt("pesawat.idpesawat"));
                pesawat.setNama(result.getString("pesawat.namapesawat"));
                PemesananTO pemesanan = new PemesananTO(0,pesawat,pembeli);
                pemesanan.setId(result.getInt("pemesanan.idpemesanan"));
                list.add(pemesanan);
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
