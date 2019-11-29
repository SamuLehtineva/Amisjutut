/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pkgabstract;

import java.util.ArrayList;

/**
 *
 * @author samu.lehtineva
 */
public abstract class Lottorunko {
    public abstract void arvonta();
    public abstract ArrayList numerot();
    public abstract void teeNumerot();
    public abstract boolean sisaltaaNumeron(int number);
    public abstract String omaTulos();
}
