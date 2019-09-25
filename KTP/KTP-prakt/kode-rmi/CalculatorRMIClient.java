import java.rmi.*;
import java.rmi.registry.*;

public class CalculatorRMIClient{
	public static void main(String[] args) throws RemoteException,NotBoundException{
		//jika tidak ada argumen, maka digunakan localhost
		String host = args.length==0?"localhost":args[0];
		//mencari registry pada port default dengan nama calculator
		Registry registry = LocateRegistry.getRegistry(host,Registry.REGISTRY_PORT);
		ICalculator calculator = (ICalculator)registry.lookup("calculator");
		//mengimplementasikan operasi pada calculator
		System.out.println(calculator.add(10.2 , 0.9));
		System.out.println(calculator.multiply(10.2 , 0.9));
	}
}