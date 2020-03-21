export class MethodUtilities {
    // per localhost
    // private static host = 'http://localhost/mani2019';
    // per serverhost
    private static host = './assets/php';

    public static urlChiSiamo = MethodUtilities.host + '/api/chi_siamo/read.php';
    public static urlNews = MethodUtilities.host + '/api/news/read.php';
    public static urlCosaFacciamo = MethodUtilities.host + '/api/cosa_facciamo/read.php';
    public static urlMembri = MethodUtilities.host + '/api/contatti/read.php';
    public static urlPartners = MethodUtilities.host + '/api/partners/read.php';
    public static urlProgetti = MethodUtilities.host + '/api/progetti/read.php';
    public static urlProgettiMedia = MethodUtilities.host + '/api/progetti_media/read_progetti_media.php';
    public static urlSendMail = MethodUtilities.host + '/api/sendMail.php';
}
