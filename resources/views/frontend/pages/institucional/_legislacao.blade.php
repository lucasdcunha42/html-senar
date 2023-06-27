@extends('templates.master')

@section('content')

    @php
        $pageVars = [];

        if($page && !empty(trim($page->banner))) {
            $pageVars['bgPagePath'] = urlStorage($page->banner, 1400, 300);
        }

    @endphp

@include('components.banner-page', $pageVars)

    <div class="o-senar-section">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="page-title center">
                        {{ $page->titulo }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-section">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <div class="accordion-container">
              <div class="accordion-container">
                <div class="accord-item">
                  <div class="accord-desc">
                    <div class="link-legislacao">
                      <div></div>
                      <p>teste - <a href="https://www.senar-rs.com.br/download-file?file=legislacoes/April2023/F7b1ulFkz1lwLwqTeaZy.pdf">tetetete</a></p>
                      <div></div>
                          </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
