public class PemesananTO implements java.io.Serializable{
    private int id;
    private String waktukeberangkatan;
    private PesawatTO pesawat;
    private PembeliTO pembeli;
    
    public PemesananTO(){
        
    }
    
    public PemesananTO(int id, PesawatTO pesawat, PembeliTO pembeli){
        this.pesawat = pesawat;
        this.pembeli = pembeli;
        this.id = id;
    }
    
    public PesawatTO getPesawat(){
        return pesawat;
    }
    public PembeliTO getPembeli(){
        return pembeli;
    }
    public int getId(){
        return id;
    }
    public String getWaktuKeberangkatan(){
        return waktukeberangkatan;
    }
    
    public void setPesawat(PesawatTO pesawat){
        this.pesawat = pesawat;
    }
    public void setPembeli(PembeliTO pembeli){
        this.pembeli = pembeli;
    }
    public void setId(int id){
        this.id = id;
    }
    public void setWaktuKeberangkatan(String waktukeberangkatan){
        this.waktukeberangkatan = waktukeberangkatan;
    }
}
