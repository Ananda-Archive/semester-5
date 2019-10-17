import java.rmi.*;
import java.rmi.registry.*;

public class RMIClientSatu{
	public static void main(String[] args)throws Exception {  
      try {
         Registry registry = LocateRegistry.getRegistry(null);
         PembeliInterface stub = (PembeliInterface) registry.lookup("Pembeli"); 
         PesawatInterface stub2 = (PesawatInterface) registry.lookup("Pesawat");
         PemesananInterface stub3 = (PemesananInterface) registry.lookup("Pemesanan"); 
         PembeliTO pembeliSatu = new PembeliTO(1,"pembeli1");
         PembeliTO pembeliDua = new PembeliTO(2,"pembeli2");
         PesawatTO pesawatSatu = new PesawatTO(1,"pesawat1");
         PesawatTO pesawatDua = new PesawatTO(2,"pesawat2");
         PemesananTO pemesananSatu = new PemesananTO(pesawatSatu,pembeliSatu);
         PemesananTO pemesananDua = new PemesananTO(pesawatDua,pembeliDua);
         stub.add(pembeliSatu);
         stub.add(pembeliDua);
         stub2.add(pesawatSatu);
         stub2.add(pesawatDua);
         stub3.add(pemesananSatu);
         stub3.add(pemesananDua);
         stub.delete(1);
         stub2.delete(1);
         stub3.delete(38);
         pembeliDua.setNama("pembeliUpdate");
         stub.update(pembeliDua);
         pesawatDua.setNama("pesawatUpdate");
         stub2.update(pesawatDua);
         pemesananSatu.setPembeli(pembeliSatu);
         pemesananSatu.setPesawat(pesawatSatu);
         stub3.update(pemesananDua);
         System.out.println(stub.getAll());
         System.out.println(stub2.getAll());
         System.out.println(stub3.getAll());
      } catch (Exception e) { 
         System.err.println("Client exception: " + e.toString()); 
         e.printStackTrace(); 
      } 
   } 
}