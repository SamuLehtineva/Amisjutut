package javakoe4;
import java.util.*;
/**
 *
 * @author samu.lehtineva
 */
public class Javakoe4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        HashMap<Integer,Integer>asia=new HashMap<Integer, Integer>();
        asia.put(1, 5000);
        asia.put(2, 700);
        asia.put(3, 30);
        asia.put(4, 100);
        asia.put(5, 60);
        Set set = asia.entrySet();
        Iterator i = set.iterator();
        
        int luku2 = 0;
        int jee = 1;
        int luku1 = asia.get(jee);
        for (int a = 1; a < asia.size(); a++) {
            
            if (luku1 < asia.get(a)) {
                luku2 = asia.get(a);
            } else {
                luku2 = luku1;
            }
            jee++;
        }
        System.out.println(luku2);
    }
    
}
