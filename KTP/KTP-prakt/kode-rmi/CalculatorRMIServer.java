import java.rmi.registry.*;
import java.rmi.server.*;
import java.rmi.*;

public class CalculatorRMIServer{
	public static void main(String[] args) throws RemoteException{
		//membuat registry pada default port untuk objek calculator
		Registry registry = LocateRegistry.createRegistry(Registry.REGISTRY_PORT);
		Calculator calc = new Calculator();
		ICalculator icalc= (ICalculator) UnicastRemoteObject.exportObject(calc,0);
		registry.rebind("calculator",icalc);
		System.out.println("Server ready");
	}
}