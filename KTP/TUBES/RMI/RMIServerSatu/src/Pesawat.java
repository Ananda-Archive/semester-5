import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

public class Pesawat implements PesawatInterface {
    Connection connection = null;
    public Pesawat(){
        connection = MysqlUtility.getConnection();
    }
    public void add(PesawatTO pesawat){
        Statement statement = null;
        
        try{
            statement = connection.createStatement();
            String sql = "INSERT into pesawat(idpesawat,namapesawat) VALUES (" + pesawat.getId() + ",'"+ pesawat.getNama() +"')";
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
            String sql = "DELETE FROM pesawat WHERE idpesawat="+ id;
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
    public void update(PesawatTO pesawat){
        Statement statement = null;
        try {
            statement = connection.createStatement();
            String sql = "UPDATE pesawat SET namapesawat='" + pesawat.getNama() + "' WHERE idpesawat='" + pesawat.getId() + "'";
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
    public List<PesawatTO> getAll(){
        Statement statement = null;
        ResultSet result = null;
        List<PesawatTO> list = new ArrayList<>();
        try{
            statement = connection.createStatement();
            String sql = "SELECT * FROM Pesawat";
            result = statement.executeQuery(sql);
            while(result.next()){
                PesawatTO pesawat = new PesawatTO();
                pesawat.setId(result.getInt("idpesawat"));
                pesawat.setNama(result.getString("namapesawat"));
                list.add(pesawat);
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
