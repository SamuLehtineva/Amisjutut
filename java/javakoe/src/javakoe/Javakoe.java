package javakoe;
/**
 *
 * @author samu.lehtineva
 */
public class Javakoe {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        boolean ok = true;
        int i = 0;
        while(ok) {
            System.out.println("Anna luku :");
            int luku1 = Reader.readInt();
            if(luku1==0) {
                ok = false;
            } else if (luku1%2==0) {
                System.out.println("Luku on parillinen");
            } else {
                System.out.println("Luku on pariton");
            }
            i++;
        }
        System.out.println("Annoit lukuja "+i+"kpl");
    }
    
}
