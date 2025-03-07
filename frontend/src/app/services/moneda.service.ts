import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment.development';

@Injectable({
  providedIn: 'root'
})
export class MonedaService {
  private apiUrl: string = environment.apiUrl;

  constructor(
    private http: HttpClient
  ) { }

  getMoneda(ciudad: string) {
    return this.http.get<any>(`${this.apiUrl}/monedas/${ciudad}`);
  }

}
