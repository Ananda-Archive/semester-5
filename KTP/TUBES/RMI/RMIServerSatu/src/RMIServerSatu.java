import java.rmi.registry.*;
import java.rmi.server.*;
import java.rmi.*;

public class RMIServerSatu extends Pembeli{
    public static void main(String[] args) throws RemoteException{
		Registry registry = LocateRegistry.createRegistry(Registry.REGISTRY_PORT);
		Pembeli pembeli = new Pembeli();
		Pesawat pesawat = new Pesawat();
		Pemesanan pemesanan = new Pemesanan();
		PembeliInterface ipembeli= (PembeliInterface) UnicastRemoteObject.exportObject(pembeli,0);
		PesawatInterface ipesawat= (PesawatInterface) UnicastRemoteObject.exportObject(pesawat,0);
		PemesananInterface ipemesanan= (PemesananInterface) UnicastRemoteObject.exportObject(pemesanan,0);
		registry.rebind("Pembeli",ipembeli);
		registry.rebind("Pesawat",ipesawat);
		registry.rebind("Pemesanan",ipemesanan);
		System.out.println("Server ready");
    }
}
