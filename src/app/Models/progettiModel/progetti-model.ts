import { ProgettiMediaModel } from '../progettiMediaModel/progetti-media-model';

export class ProgettiModel {
    public progetti_id: number;
    public column_position: number;
    public title: string;
    public location: string;
    public short_description: string;
    public long_description: string;
    public image_url: string;
    public progetti_date: Date;
    public seo_title: string;
    public listaProgMedia: ProgettiMediaModel[];
}