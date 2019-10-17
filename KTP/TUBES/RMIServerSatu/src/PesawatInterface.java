import java.util.List;
import java.rmi.*;

public interface PesawatInterface extends Remote {
    public void add(PesawatTO pesawat) throws Exception;
    public void delete(int id) throws Exception;
    public void update(PesawatTO pesawat) throws Exception;
    public List<PesawatTO> getAll() throws Exception;
}