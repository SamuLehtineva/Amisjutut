package javakoe2;

/**
 *
 * @author samu.lehtineva
 */
public class Javakoe2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        System.out.println("Anna kolmion korkeus 1-20 :");
        int luku1 = Reader.readInt();
        if (luku1<0 || luku1>20) {
            System.out.println("Huono korkeus");
        } else {
        String merkki = "*";
        int i =0;
        while(i<luku1) {
            merkki =" "+merkki;
            i++;
        }
        for(int luku2 = 0; luku2<luku1; merkki=merkki.substring(1)+"**") {
            System.out.println(merkki);
            luku2++;
        }
        }
    }
    
}
