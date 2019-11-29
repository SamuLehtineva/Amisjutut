/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jpanel;
import java.awt.BorderLayout;
import javax.swing.JFrame;

/**
 *
 * @author samu.lehtineva
 */
public class JPanel {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Klassi2 asia = new Klassi2();
        try {
            JFrame jf = new JFrame();
            jf.setLayout(new BorderLayout());
            jf.setSize(400, 400);
            Klassi2 nj = new Klassi2();
            jf.add(nj);
            jf.setVisible(true);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    
}
