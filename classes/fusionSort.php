<?php
require_once ('Sort.php');
/**
 *
 */
class fusiontSort extends Sort
{

    public function getSortedList()
    {
        public static int[] fusion(int [] tab1, int [] tab2)
    {
        int taille_g = tab1 . length;
        int taille_d = tab2 . length;
        int [] res = new int[taille_g + taille_d];  //En Java, lorsqu'on déclare un tableau, il faut indiquer sa longueur
        int i_g = 0;
        int i_d = 0;
        int i;  //L’auteur ne met pas d’accolades après le for il faut donc déclarer i ici
        for (i = 0; i_g < taille_g && i_d < taille_d; i++)
            if (tab1[i_g] <= tab2[i_d])
                res[i] = tab1[i_g++];
            else
                res[i] = tab2[i_d++]; //Attention c'est tab2
            /* on copie le reste du tableau de gauche (s'il reste quelque chose) */
        while (i_g < taille_g)
            res[i++] = tab1[i_g++];   //Ne pas oublier le ++ sinon on a une boucle infinie
        while (i_d < taille_d)
            res[i++] = tab2[i_d++];   //Pareil c'est tab2
        return res;
    }

    public static int[] copie(int [] tab, int debut, int fin)
    {
        int[] res = new int[fin - debut + 1]; //Pareil, on indique la longueur
        for (int i = debut; i <= fin;i++)
        {
            res[i - debut] = tab[i];
        }
        return res;
    }

    public static int[] tri_fusion(int[] tab)
    {
        int taille = tab . length;
        if (taille <= 1)
            return tab;
        else {
            int mileu = taille / 2;
            int[] gauche = copie(tab, 0, mileu - 1);
            int[] droite = copie(tab, mileu, taille - 1);
            return fusion(tri_fusion(gauche), tri_fusion(droite));
        }
    }

}

?>