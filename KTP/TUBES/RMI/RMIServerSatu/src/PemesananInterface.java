import java.util.List;
import java.rmi.*;

public interface PemesananInterface extends Remote {
    public void add(PemesananTO pemesanan) throws Exception;
    public void delete(int id) throws Exception;
    public void update(PemesananTO pemesanan) throws Exception;
    public List<PemesananTO> getAll() throws Exception;
}
