import java.rmi.*;

public interface ICalculator extends Remote{
	public double add(double num1, double num2) throws RemoteException;
	public double multiply(double num1, double num2) throws RemoteException;
}