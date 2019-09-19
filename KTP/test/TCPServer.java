import java.io.*;
import java.net.*;

public class TCPServer{
    public static void main(String args[]){
        try{
            int serverPort = 8888;
            ServerSocket listenSocket = new ServerSocket(serverPort);
            while (true){                
                Socket clientSocket = listenSocket.accept();
                Connection c = new Connection(clientSocket);
                c.run();
            }
        }catch (IOException e){
                System.out.println("Listen: " + e.getMessage());
        }
    }
}